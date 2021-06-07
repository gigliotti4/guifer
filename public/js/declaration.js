/**
 * ----------------------------------------
 *              CONSIDERACIONES
 * ---------------------------------------- */
/**
 * Las entidades nombradas a continuación tienen referencia con una tabla de la BASE DE DATOS.
 * Respetar el nombre de las columnas
 *
 * @version 2
 */
const ENTIDADES = {
    slider: {
        //TABLE: "sliders",
        ATRIBUTOS: {
            order: {TIPO:"TP_STRING",RULE: "max:3",LABEL:1,MAXLENGTH:3,VISIBILIDAD:"TP_VISIBLE",CLASS:"text-uppercase text-center border-left-0 border-right-0 border-top-0 rounded-0",WIDTH:"70px",NOMBRE:"orden"},
            image: {TIPO:"TP_IMAGE",RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER:"slider",SIMPLE:1,NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Archivo - 1350px X 468px",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"1350px"},
            section: {TIPO:"TP_STRING",RULE: "required|max:20",VISIBILIDAD:"TP_INVISIBLE",NOMBRE:"sección"},
            text: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"}
        },
        FORM: [
            {
                '/section/<div class="col-12 col-md-8"><div class="row d-flex justify-content-center"><div class="col-md-6 mb-3">/order/</div><div class="col-12">/image/</div></div></div>':['section','order','image'],
            },
            {
                '<div class="col-12">/text/</div>': ['text']
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
        EDITOR: {
            text: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                colorButton_colors : colorPick,
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,RemoveFormat,CopyFormatting,NumberedList,BulletedList,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Unlink,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,Maximize,ShowBlocks,About'
            }
        },
    },
    language: {
        TABLE: "languages",
        ATRIBUTOS: {
            key: {TIPO:"TP_STRING",LABEL:1,MAXLENGTH:20,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"clave",HELP:"Valor utilizado para identificar. Evite modificar este valor."},
            option: {TIPO:"TP_STRING",LABEL:1,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"opción"}
        },
        FORM: [
            {
                '<div class="col-12">/key/</div>': ['key']
            },
            {
                '<div class="col-12"><div class="row">/option/</div></div>': ['option']
            }
        ]
    },

    clientes: {
        ATRIBUTOS: {
            order: {TIPO:"TP_STRING",RULE: "max:3",MAXLENGTH:3,VISIBILIDAD:"TP_VISIBLE",CLASS:"text-uppercase text-center border-left-0 border-right-0 border-top-0",WIDTH:"150px"},
            name: {TIPO:"TP_STRING",RULE: "required|max:70",MAXLENGTH:70,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0"},
            image: {TIPO:"TP_IMAGE",RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Seleccione archivo - 270x168",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"270px", HEIGHT: "168px", SIMPLE: 1}
        },
        FORM: [
            {
                '<div class="col-5 col-md-3">/order/</div><div class="col-12 col-md-9">/name/</div>' : [ "order" , "name" ],
            },
            {
                '<div class="col-12 col-md-6">/image/</div>' : [ "image" ],
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        }
    },

    contenido_home: {
        ATRIBUTOS: {
            texto: {TIPO:"TP_TEXT",VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,CLASS:"rounded-0 border-left-0 border-right-0 border-top-0",NOMBRE:"texto"},
        },
        FORM: [
            {
                '<div class="col-12">/texto/</div>' : [ 'texto' ],
            }
        ],
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                colorButton_colors : colorPick,
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,RemoveFormat,CopyFormatting,NumberedList,BulletedList,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Unlink,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,Maximize,ShowBlocks,About'
            }
        },
    },
    contenido_home_numero: {
        ATRIBUTOS: {
            image: {TIPO:"TP_IMAGE",RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER: "contenido",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Seleccione archivo - 80x80",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"80px"},
            order: {TIPO:"TP_ENTERO",MAXLENGTH:2,NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"orden", CLASS:"bg-transparent border-left-0 border-right-0 bg-transparent border-top-0 rounded-0",SIMPLE:1},
            texto: {TIPO:"TP_TEXT",VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,CLASS:"border-left-0 rounded-0 border-right-0 border-top-0 bg-transparent"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-6">/order/</div>' : [ 'order' ]
            },
            {
                '<div class="col-12 col-md-8">/image/</div>' : [ 'image' ],
            },
            {
                '<div class="col-12">/texto/</div>' : [ 'texto' ]
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                colorButton_colors : colorPick,
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Language,Anchor,Unlink,Link,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,Maximize,ShowBlocks,About'
            }
        },
    },

    contenido_empresa: {
        ATRIBUTOS: {
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"texto"},
            image: {TIPO:"TP_IMAGE",FOLDER:"contenido",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Seleccione archivo - 359x574",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"354px", HEIGHT: "574px",SIMPLE:1}
        },
        FORM: [
            {
                '<div class="col-12 col-md-8">/texto/</div><div class="col-12 col-md-4">/image/</div>' : ["texto", "image"]
            }
        ],
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,RemoveFormat,CopyFormatting,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Unlink,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,Maximize,ShowBlocks,About',
                colorButton_colors : colorPick,
                height: '574px'
            }
        },
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        }
    },

    contenido_video: {
        ATRIBUTOS: {
            order: {TIPO:"TP_ENTERO",MAXLENGTH:2,NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"orden",CLASS:"bg-transparent border-left-0 border-right-0 bg-transparent border-top-0 rounded-0",SIMPLE:1},
            titulo: {TIPO:"TP_STRING", LABEL:1,MAXLENGTH:100,VISIBILIDAD:"TP_VISIBLE",CLASS:"bg-transparent border-left-0 border-right-0 border-top-0 rounded-0"},
            video: {TIPO:"TP_YOUTUBE",LABEL:1 ,MAXLENGTH:30,VISIBILIDAD:"TP_VISIBLE",WIDTH:"150px",CLASS:"bg-transparent border-left-0 rounded-0 border-right-0 border-top-0",HELP:"Copie el código del video de YouTuve (https://www.youtube.com/watch?v=<strong>XXXXXX</strong>) e inserte en el cuadro de texto"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-4">/order/</div><div class="col-12 mt-3">/video/</div>' : ["order", "video"]
            },
            {
                '<div class="col-12"><div class="row">/titulo/</div></div>' : [ 'titulo' ],
            }
        ],
    },
    contenido_servicio: {
        ATRIBUTOS: {
            order: {TIPO:"TP_ENTERO",MAXLENGTH:2,NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"orden",CLASS:"border-left-0 border-right-0 bg-transparent border-top-0 rounded-0",SIMPLE:1},
            image: {TIPO:"TP_IMAGE",FOLDER: "servicio",RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"600x400",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"600px", SIMPLE: 1},
            titulo: {TIPO:"TP_STRING",RULE: "max:150",NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título",LABEL:1, CLASS:"border-left-0 rounded-0 border-right-0 border-top-0 bg-transparent"},
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"}
        },
        FORM: [
            {
                '<div class="col-12 col-md-5"><div class="row justify-content-center"><div class="col-12 col-md-4 mb-3">/order/</div><div class="col-12">/image/</div></div></div><div class="col-12 col-md-7"><div class="row"><div class="col-12 mb-3">/titulo/</div><div class="col-12">/texto/</div></div></div>' : [ "order", "image", "titulo", "texto" ]
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates,Cut,Copy,Paste,PasteFromWord,PasteText,Undo,Redo,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,BidiLtr,Language,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,ShowBlocks,Maximize,About',
                colorButton_colors : colorPick,
                height: '250px'
            }
        }
    },
    contenido_post: {
        ATRIBUTOS: {
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"}
        },
        FORM: [
            {
                '<div class="col-12"><div class="row">/texto/</div></div>' : [ "texto" ]
            }
        ],
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates,Cut,Copy,Paste,PasteFromWord,PasteText,Undo,Redo,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,BidiLtr,Language,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,ShowBlocks,Maximize,About',
                colorButton_colors : colorPick,
                height: '250px'
            }
        }
    },
    contenido_post_form: {
        ATRIBUTOS: {
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"}
        },
        FORM: [
            {
                '<div class="col-12"><div class="row">/texto/</div></div>' : [ "texto" ]
            }
        ],
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates,Cut,Copy,Paste,PasteFromWord,PasteText,Undo,Redo,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,BidiLtr,Language,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,ShowBlocks,Maximize,About',
                colorButton_colors : colorPick,
                height: '250px'
            }
        }
    },
    contenido_post_icono: {
        ATRIBUTOS: {
            order: {TIPO:"TP_ENTERO",MAXLENGTH:2,NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"orden",CLASS:"border-left-0 border-right-0 bg-transparent border-top-0 rounded-0",SIMPLE:1},
            titulo: {TIPO:"TP_STRING",VISIBILIDAD:"TP_VISIBLE",LABEL:1,NOMBRE:"tí­tulo",CLASS:"border-left-0 rounded-0 border-right-0 border-top-0 bg-transparent"},
            image: {TIPO:"TP_IMAGE",FOLDER:"postventa",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"90x90",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"270px"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-8">/order/</div>' : [ "order" ]
            },
            {
                '<div class="col-12"><div class="row">/titulo/</div></div>' : [ "titulo" ]
            },
            {
                '<div class="col-12">/image/</div>' : [ "image" ]
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        }
    },

    /**********************************
            BLOG
     ********************************** */
    blog: {
        TABLE: "blogs",
        ATRIBUTOS: {
            //order: {TIPO:"TP_STRING",LABEL:1,MAXLENGTH:3,VISIBILIDAD:"TP_VISIBLE",CLASS:"text-uppercase text-center border-left-0 border-right-0 border-top-0 rounded-0",WIDTH:"70px",NOMBRE:"orden"},
            date: {TIPO:"TP_FECHA",RULE: "date",FORMAT:[ "dd" , "/" , "mm" , "/" , "aaaa" ],VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0 text-right",NOMBRE:"fecha"},
            title: {TIPO:"TP_STRING",RULE: "required|max:150",LABEL:1,MAXLENGTH:150,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"título"},
            resume: {TIPO:"TP_TEXT",FIELDSET:1,VISIBILIDAD:"TP_VISIBLE_FORM",NOMBRE:"resumen"},
            text: {TIPO:"TP_TEXT",FIELDSET:1,VISIBILIDAD:"TP_VISIBLE_FORM",NOMBRE:"detalles"},
            image: {TIPO:"TP_ARRAY",COLUMN:"image",VISIBILIDAD:"TP_VISIBLE_TABLE",NOMBRE:"imágenes",CLASS:"text-center"},
            category_id: {TIPO:"TP_ENUM",CLASS:"selectpicker",VISIBILIDAD:"TP_VISIBLE",ENUMOP:"categorias",NOMBRE:"categoria",LABEL:1},
            is_destacado: {TIPO:"TP_CHECK",VISIBILIDAD:"TP_VISIBLE",CHECK:"¿Noticia destacada?",NOMBRE:"Destacado",OPTION:{ "" : "NO" , true : "Si"}}
        },
        FORM: [
            {
                '<div class="col-12">/title/</div>': ['title']
            },
            {
                '<div class="col-12 col-md">/category_id/</div><div class="col-12 col-md">/date/</div>':['category_id','date']
            },
            {
                '<div class="col-12">/is_destacado/</div>': ['is_destacado']
            },
            {
                '<div class="col-12">/resume/</div>': ['resume']
            },
            {
                '<div class="col-12">/text/</div>': ['text']
            }
        ],
        EDITOR: {
            resume: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'NewPage,Save,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,CopyFormatting,RemoveFormat,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Unlink,Anchor,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,Maximize,ShowBlocks,About,Subscript,Superscript,BulletedList,NumberedList,Outdent,Indent,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,Image,Link,Format,Table',
                colorButton_colors : colorPick,
                height: '150px'
            },
            text: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'NewPage,Save,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,CopyFormatting,RemoveFormat,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Unlink,Anchor,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,Maximize,ShowBlocks,About',
                colorButton_colors : colorPick,
                height: '450px'
            }
        },
    },
    blog_images: {
        ATRIBUTOS: {
            order: {TIPO:"TP_ENTERO",MAXLENGTH:2,NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"orden",CLASS:"border-left-0 border-right-0 bg-transparent border-top-0 rounded-0",SIMPLE:1},
            image: {TIPO:"TP_IMAGE",RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER:"noticias",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Archivo - 640px X 355px",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"640px", SIMPLE: 1},
        },
        FORM: [
            {
                '<div class="col-12 col-md">/order/</div>':['order']
            },
            {
                '<div class="col-12">/image/</div>':['image'],
            },
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        }
    },
    blogcategoria: {
        TABLE: "blogcategorias",
        ATRIBUTOS: {
            order: {TIPO:"TP_STRING",RULE: "max:3",LABEL:1,MAXLENGTH:3,VISIBILIDAD:"TP_VISIBLE",CLASS:"text-uppercase text-center border-left-0 border-right-0 border-top-0 rounded-0",WIDTH:"70px",NOMBRE:"orden"},
            title: {TIPO:"TP_STRING",RULE: "required|max:150",LABEL:1,MAXLENGTH:150,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"título", WIDTH: "250px"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-4">/order/</div>': ['order']
            },
            {
                '<div class="col-12">/title/</div>': ['title']
            }
        ]
    },
    /**********************************
            PRODUCTOS
     ********************************** */
    marcas: {
        TABLE: "marcas",
        ATRIBUTOS: {
            orden: {TIPO:"TP_STRING",MAXLENGTH:3,VISIBILIDAD:"TP_VISIBLE",CLASS:"text-uppercase text-center border-left-0 border-right-0 border-top-0",WIDTH:"150px"},
            nombre: {TIPO:"TP_STRING",MAXLENGTH:70,VISIBILIDAD:"TP_VISIBLE",CLASS:"rounded-0 border-left-0 border-right-0 border-top-0",LABEL:1},
            image: {TIPO:"TP_IMAGE",NECESARIO:1,VALID:"Imagen OK",INVALID:"Imagen - variado",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"150px"},
            portada: {TIPO:"TP_IMAGE",NECESARIO:1,VALID:"Portada OK",INVALID:"Portada - 237x237",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE_FORM",ACCEPT:"image/*",NOMBRE:"Portada",WIDTH:"150px"},
            text: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"descripción"},
            detalle: {TIPO:"TP_TEXT",VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"detalle"},
        },
        FORM: [
            {
                '<div class="col-5 col-md-3">/orden/</div>' : ["orden"]
            },
            {
                '<div class="col-12 col-md-4">/image/</div><div class="col-12 col-md-4">/portada/</div>' : [ "image" , "portada" ]
            },
            {
                '<div class="col-12">/nombre/</div>' : [ "nombre" ]
            },
            {
                '<div class="col-12"><div class="row mt-n2">/text/</div></div>' : [ "text" ]
            },
            {
                '<div class="col-12"><div class="row mt-n2">/detalle/</div></div>' : [ "detalle" ]
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}},
            portada: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
        EDITOR: {
            text: {
                toolbarGroups: [
                    { name: 'document', groups : [ 'mode' , 'document' , 'doctools' ] },
                    { name: 'basicstyles', groups : [ 'basicstyles' ] },
                    { name: 'clipboard', groups : [ 'clipboard' , 'undo' ] },
                    { name: 'links' },
                    { name: 'colors', groups: [ 'TextColor' , 'BGColor' ] },
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates'
            },
            detalle: {
                toolbarGroups: [
                    { name: 'document', groups : [ 'mode' , 'document' , 'doctools' ] },
                    { name: 'basicstyles', groups : [ 'basicstyles' ] },
                    { name: 'clipboard', groups : [ 'clipboard' , 'undo' ] },
                    { name: 'links' },
                    { name: 'colors', groups: [ 'TextColor' , 'BGColor' ] },
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates'
            }
        }
    },
    producto: {
        TABLE: "productos",
        ATRIBUTOS: {
            category_id: {TIPO:"TP_ENUM",CLASS:"selectpicker",VISIBILIDAD:"TP_VISIBLE",ENUMOP:"categorias",NOMBRE:"categoria",LABEL:1},
            code: {TIPO:"TP_STRING",RULE: "max:10",LABEL:1,MAXLENGTH:10,VISIBILIDAD:"TP_VISIBLE",CLASS:"text-uppercase text-center border-left-0 border-right-0 border-top-0 rounded-0",WIDTH:"70px",NOMBRE:"código"},
            ficha: {TIPO:"TP_STRING",RULE: "max:50",LABEL:1,MAXLENGTH:50,VISIBILIDAD:"TP_VISIBLE_FORM",CLASS:"rounded-0 border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"ficha", WIDTH: "100px", HELP: "Solo el nombre del archivo. El mismo se encuentra en la carpeta FICHA"},
            plano: {TIPO:"TP_STRING",RULE: "max:50",LABEL:1,MAXLENGTH:50,VISIBILIDAD:"TP_VISIBLE_FORM",CLASS:"rounded-0 border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"plano", WIDTH: "100px", HELP: "Solo el nombre del archivo. El mismo se encuentra en la carpeta IMAGES/PLANOS"},
            title: {TIPO:"TP_STRING",RULE: "required|max:150",LABEL:1,MAXLENGTH:150,VISIBILIDAD:"TP_VISIBLE",CLASS:"rounded-0 border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"título", WIDTH: "250px"},
            subtitle: {TIPO:"TP_TEXT",LABEL:1,VISIBILIDAD:"TP_VISIBLE_FORM",CLASS:"rounded-0 border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"subtítulo", WIDTH: "250px"},
            text: {TIPO:"TP_TEXT",FIELDSET:1,VISIBILIDAD:"TP_VISIBLE_FORM",NOMBRE:"descripción"},
            words: {TIPO:"TP_TEXT",FIELDSET:1,VISIBILIDAD:"TP_VISIBLE_FORM",NOMBRE:"palabras claves", HELP: "Palabras claves, separadas por una coma (,)"},
            table: {TIPO:"TP_TEXT",FIELDSET:1,VISIBILIDAD:"TP_VISIBLE_FORM",NOMBRE:"detalles"},
            is_destacado: {TIPO:"TP_CHECK",VISIBILIDAD:"TP_VISIBLE",CHECK:"¿Producto destacado?",NOMBRE:"Destacado",OPTION:{ "" : "NO" , true : "Si"}},
            images: {TIPO:"TP_ARRAY",COLUMN:"images",VISIBILIDAD:"TP_VISIBLE_TABLE",NOMBRE:"imágenes",CLASS:"text-center"},
        },
        FORM: [
            {
                '<div class="col-12 col-md">/code/</div><div class="col-12 col-md">/is_destacado/</div>': ['code', 'is_destacado']
            },
            {
                '<div class="col-12">/category_id/</div>': ['category_id']
            },
            {
                '<div class="col-12">/title/</div>': ['title']
            },
            {
                '<div class="col-12 col-md">/ficha/</div><div class="col-12 col-md">/plano/</div>': ['ficha', 'plano']
            },
            {
                '<div class="col-12">/text/</div>': ['text']
            },
            {
                '<div class="col-12">/words/</div>': ['words']
            },
            {
                '<div class="col-12">/table/</div>': ['table']
            },
        ],
        EDITOR: {
            text: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Cut,Templates,Copy,Paste,PasteText,PasteFromWord,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,RemoveFormat,CopyFormatting,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,Maximize,ShowBlocks,About,Replace',
                colorButton_colors : colorPick,
                height: '250px'
            },
            table: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Paste,Copy,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,RemoveFormat,CopyFormatting,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Unlink,Link,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,ShowBlocks,Maximize,About',
                colorButton_colors : colorPick,
                height: '150px'
            }
        }
    },
    producto_images: {
        ATRIBUTOS: {
            order: {TIPO:"TP_ENTERO",MAXLENGTH:2,NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"orden",CLASS:"border-left-0 border-right-0 bg-transparent border-top-0 rounded-0",SIMPLE:1},
            image: {TIPO:"TP_STRING",LABEL:1,MAXLENGTH:50,VISIBILIDAD:"TP_VISIBLE_FORM",CLASS:"rounded-0 bg-transparent border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"plano", WIDTH: "100px", HELP: "Solo el nombre del archivo. El mismo se encuentra en la carpeta IMAGES/PRODUCTOS"},
        },
        FORM: [
            {
                '<div class="col-12 col-md">/order/</div>':['order']
            },
            {
                '<div class="col-12">/image/</div>':['image'],
            },
        ]
    },
    categoria: {
        TABLE: "categorias",
        ATRIBUTOS: {
            order: {TIPO:"TP_STRING",RULE: "max:3",MAXLENGTH:3,VISIBILIDAD:"TP_VISIBLE",LABEL:1,CLASS:"rounded-0 text-uppercase text-center border-left-0 border-right-0 border-top-0",WIDTH:"70px"},
            name: {TIPO:"TP_STRING",RULE: "required|max:100",VISIBILIDAD:"TP_VISIBLE",LABEL:1,CLASS:"border-left-0 rounded-0 border-right-0 border-top-0", WIDTH: "250px",NOMBRE: "nombre"},
            image: {TIPO:"TP_IMAGE",RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER:"categorias",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Seleccione archivo - 500x500",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"500px", HEIGHT: "500px", SIMPLE: 1},
            is_destacado: {TIPO:"TP_CHECK",VISIBILIDAD:"TP_VISIBLE",CHECK:"¿Noticia destacada?",NOMBRE:"Destacado",OPTION:{ "" : "NO" , true : "Si"}, WIDTH: "150px"}
        },
        FORM: [
            {
                '<div class="col-6 col-lg-3">/order/</div><div class="col-6 col-lg-3">/is_destacado/</div>' : ["order", "is_destacado"]
            },
            {
                '<div class="col-12">/name/</div>' : ["name"]
            },
            {
                '<div class="col-12">/image/</div>' : [ "image" ]
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        }
    },
    /**********************************
            DATOS DE LA EMPRESA
     ********************************** */
    usuarios: {
        ATRIBUTOS: {
            username: {TIPO:"TP_STRING",MAXLENGTH:30,NECESARIO:1,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"usuario",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0"},
            name: {TIPO:"TP_STRING",MAXLENGTH:100,NECESARIO:1,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"nombre",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0"},
            password: {TIPO:"TP_PASSWORD",VISIBILIDAD:"TP_VISIBLE_FORM",LABEL:1,NOMBRE:"contraseña",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",HELP:"SOLO PARA EDICIÓN - para no cambiar la contraseña, deje el campo vacío"},
            is_admin: {TIPO:"TP_ENUM",VISIBILIDAD:"TP_VISIBLE",ENUM:{1:"Administrador",0:"Usuario"},NOMBRE:"Tipo",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0 text-uppercase",COMUN:1, NECESARIO: 1},
            login: {TIPO:"TP_FECHA",VISIBILIDAD:"TP_VISIBLE_TABLE",NOMBRE:"último ingreso",FORMAT:"{day}/{month}/{year} {hour}:{minute}:{second}"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-6">/is_admin/</div>' : ['is_admin',]
            },
            {
                '<div class="col-12">/name/</div>' : [ 'name' ]
            },
            {
                '<div class="col-12 col-md-6">/username/</div><div class="col-12 col-md-6">/password/</div>' : ['username','password']
            }
        ]
    },
    imagen: {
        ATRIBUTOS: {
            image: {TIPO:"TP_IMAGE",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Seleccione archivo - (?)px x (?)px",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"150px"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-8">/image/</div>' : ['image']
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
    },
    terminos: {
        ATRIBUTOS: {
            titulo: {TIPO:"TP_STRING",LABEL: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0"},
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto",HELP:'Términos y condiciones de ejemplo sacado de <a href="https://terminosycondicionesdeusoejemplo.com/" target="_blank" rel="noopener noreferrer" class="text-primary">https://terminosycondicionesdeusoejemplo.com/ <i class="fas fa-external-link-alt ml-1"></i></a>'}
        },
        FORM: [
            {
                '<div class="col-12">/titulo/</div>': ['titulo']
            },
            {
                '<div class="col-12">/texto/</div>' : ['texto']
            }
        ],
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates,Cut,Copy,PasteText,Paste,PasteFromWord,Redo,Undo,Replace,SelectAll,Find,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,ShowBlocks,Maximize,About,Superscript,Subscript,Strike',
                colorButton_colors : colorPick,
                height : '350px'
            },
        },
    },
    empresa_captcha: {
        ATRIBUTOS: {
            public: {TIPO:"TP_STRING",LABEL: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"clave pública",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0"},
            private: {TIPO:"TP_STRING",LABEL: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"clave secreta",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0"},
        },
        FORM: [
            {
                '<div class="col-12 col-md">/public/</div><div class="col-12 col-md">/private/</div>' : ['public','private']
            }
        ]
    },
    metadatos: {
        ATRIBUTOS: {
            seccion: {TIPO:"TP_STRING",VISIBILIDAD:"TP_VISIBLE_TABLE",CLASS:"text-uppercase",NOMBRE:"sección"},
            keywords: {TIPO:"TP_TEXT",VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"Palabras", CLASS:"rounded-0",HELP:"Separa elementos con coma (,)", WIDTH: "150px;"},
            description: {TIPO:"TP_TEXT",VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"descripción", CLASS:"rounded-0", WIDTH: "250px;"}
        },
        FORM: [
            {
                '/seccion/<div class="col-12">/description/</div><div class="col-12 mt-2">/keywords/</div>' : ['description', 'keywords', 'seccion']
            }
        ],
    },
    newsletter: {
        ATRIBUTOS: {
            idioma: {TIPO:"TP_STRING",MAXLENGTH:3,NECESARIO:1,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"idioma",CLASS:"border-left-0 rounded-0 border-right-0 border-top-0 rounded-0"},
            mail: {TIPO:"TP_STRING",MAXLENGTH:150,NECESARIO:1,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"email",CLASS:"border-left-0 rounded-0 border-right-0 border-top-0 rounded-0"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-4">/idioma/</div><div class="col-12 col-md-8">/mail/</div>' : ['idioma','mail']
            }
        ]
    },
    redes: {
        ATRIBUTOS: {
            redes: {TIPO:"TP_ENUM",LABEL:1,ENUM:{facebook:'Facebook',instagram:'Instagram',twitter:'Twitter',youtube:'YouTube',linkedin:'LinkedIn',pinterest:'Pinterest'},NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",CLASS:"text-uppercase border-left-0 border-right-0 border-top-0",NOMBRE:"red social",COMUN:1},
            titulo: {TIPO:"TP_STRING",LABEL: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0"},
            url: {TIPO:"TP_LINK",LABEL: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"link del sitio",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-6 col-lg-6">/redes/</div>' : ['redes']
            },
            {
                '<div class="col-12 col-md-10 col-lg-9">/titulo/</div>' : ['titulo']
            },
            {
                '<div class="col-12 col-md-10 col-lg-9">/url/</div>': ['url']
            }
        ],
        PADRE: "empresa"
    },
    empresa: {
        ATRIBUTOS: {
            schedule: {TIPO:"TP_STRING",LABEL:1,MAXLENGTH:150,VISIBILIDAD:"TP_VISIBLE",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0",NOMBRE: "Horario"}
        },
        FORM: [
            {
                '<div class="col-12">/schedule/</div>' : ['schedule']
            }
        ]
    },
    empresa_email: {
        ATRIBUTOS: {
            email: {TIPO:"TP_EMAIL",LABEL:1,MAXLENGTH:150,VISIBILIDAD:"TP_VISIBLE",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"}
        },
        FORM: [
            {
                '<div class="col-12">/email/</div>' : ['email']
            }
        ]
    },
    empresa_telefono: {
        ATRIBUTOS: {
            telefono: {TIPO:"TP_PHONE",LABEL:1,MAXLENGTH:50,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"número",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0",HELP:"Contenido oculto en el HREF. Solo números"},
            tipo: {TIPO:"TP_ENUM",ENUM:{tel:"Teléfono/Celular",wha:"Whatsapp"},NECESARIO:1,VISIBILIDAD:"TP_VISIBLE_FORM",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0 text-uppercase",NOMBRE:"Tipo",COMUN: 1},
            visible: {TIPO:"TP_STRING",LABEL:1,MAXLENGTH:50,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"elemento visible",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0",HELP:"Contenido visible. En caso de permanecer vacío, se utilizará el primer campo"},
            is_link: {TIPO:"TP_CHECK",VISIBILIDAD:"TP_VISIBLE",CHECK:"¿Es clickeable?"},
            in_header: {TIPO:"TP_CHECK",VISIBILIDAD:"TP_VISIBLE",CHECK:"¿Esta en la cabecera?"}
        },
        FORM: [
            {
                '<div class="col-12 col-md-6">/tipo/</div><div class="col-12 mt-3">/telefono/</div>' : ['tipo','telefono']
            },
            {
                '<div class="col-12">/visible/</div>':['visible']
            },
            {
                '<div class="col-12 d-flex justify-content-between">/is_link//in_header/</div>':['is_link','in_header']
            }
        ]
    },
    empresa_domicilio: {
        ATRIBUTOS: {
            calle: {TIPO:"TP_STRING",LABEL:1,VISIBILIDAD:"TP_VISIBLE",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"},
            altura: {TIPO:"TP_ENTERO",LABEL:1,VISIBILIDAD:"TP_VISIBLE",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"},
            localidad: {TIPO:"TP_STRING",LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"localidad",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"},
            provincia: {TIPO:"TP_STRING",LABEL:1,VISIBILIDAD:"TP_VISIBLE",DEFAULT:"Buenos Aires",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"},
            pais: {TIPO:"TP_STRING",LABEL:1,VISIBILIDAD:"TP_VISIBLE",DEFAULT:"Argentina",NOMBRE:"país",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"},
            cp: {TIPO:"TP_STRING",LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"código postal",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"},
            detalle: {TIPO:"TP_STRING",LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"detalles",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"},
            mapa: {TIPO:"TP_TEXT",LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"ubicación de Google Maps",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"},
            link: {TIPO:"TP_TEXT",LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"enlace de Google Maps",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"}
        },
        FORM: [
            {
                '<div class="col-12 col-md-8">/calle/</div><div class="col-12 col-md-4">/altura/</div>' : ['calle','altura'],
            },
            {
                '<div class="col-12 col-md-6">/cp/</div><div class="col-12 col-md-6">/pais/</div>' : ['cp','pais']
            },
            {
                '<div class="col-12 col-md-6">/provincia/</div><div class="col-12 col-md-6">/localidad/</div>' : ['provincia','localidad']
            },
            {
                '<div class="col-12 col-md">/detalle/</div>' : ['detalle']
            },
            {
                '<div class="col-12"><div class="alert alert-primary" role="alert">Copie de <a class="text-dark" href="https://www.google.com/maps" target="blank"><strong>Google Maps</strong> <i class="fas fa-external-link-alt"></i></a> la ubicación de la Empresa <i class="fas fa-share-alt"></i> / Insertar mapa / iFrame</div>/mapa/</div>' : ['mapa']
            },
            {
                '<div class="col-12"><div class="alert alert-warning" role="alert">Copie de <a class="text-dark" href="https://www.google.com/maps" target="blank"><strong>Google Maps</strong> <i class="fas fa-external-link-alt"></i></a> la ubicación de la Empresa <i class="fas fa-share-alt"></i> / Enlace para compartir</div>/link/</div>' : ['link']
            }
        ]
    },
    empresa_images: {
        ATRIBUTOS: {
            logo: {TIPO:"TP_IMAGE",RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER:"empresa",NECESARIO:1,VALID:"",INVALID:"197px X 86px",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"logotipo Header",WIDTH:"197px", HEIGHT: "86px"},
            logoFooter: {TIPO:"TP_IMAGE",RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER:"empresa",NECESARIO:1,VALID:"",INVALID:"292px X 113px",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"logotipo footer",WIDTH:"292px", HEIGHT: "113px"},
            favicon: {TIPO:"TP_IMAGE",RULE: "required|image|mimes:jpeg,png,jpg,gif,ico|max:2048",FOLDER:"empresa",NECESARIO:1,VALID:"",INVALID:"",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/x-icon,image/png",NOMBRE:"favicon",WIDTH:"70px", HEIGHT: "70px"}
        },
        FORM: [
            {
                '<div class="col-12 col-md-4">/logo/</div><div class="col-12 col-md-4">/logoFooter/</div><div class="col-12 col-md-4">/favicon/</div>' : ['logo','logoFooter','favicon']
            }
        ],
        FUNCIONES: {
            logo: {onchange:{F:"readURL(this,'/id/')",C:"id"}},
            logoFooter: {onchange:{F:"readURL(this,'/id/')",C:"id"}},
            favicon: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        }
    },
    empresa_file: {
        ATRIBUTOS: {
            image: {TIPO:"TP_IMAGE",RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER:"empresa",NECESARIO:1,VALID:"",INVALID:"150px X 70px",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"logotipo Header",WIDTH:"150px", HEIGHT: "70px"},
            archivo: {TIPO:"TP_FILE",RULE: "required|mimes:jpeg,png,jpg,gif,pdf|max:2048",FOLDER:"empresa",NECESARIO:1,VALID:"seleccionado",INVALID:"Ext: JPG, PDF, EXE, DBF, XLS y TXT",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/jpeg,application/pdf,.exe,.dbf,.DBF,.txt,.xls,.xlsx",NOMBRE:"Archivo",SIMPLE:1}
        },
        FORM: [
            {
                '<div class="col-12 col-md-6 col-lg-4"><div class="row"><div class="col-12 mb-3">/image/</div><div class="col-12">/archivo/</div></div></div>' : ['image', 'archivo']
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        }
    },
    empresa_text: {
        ATRIBUTOS: {
            text_footer: {TIPO:"TP_TEXT",FIELDSET:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"Footer"},
            newsletter: {TIPO:"TP_TEXT",FIELDSET:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"Newsletter"}
        },
        FORM: [
            {
                '<div class="col-12"><div class="row">/text_footer/</div></div>': ['text_footer']
            },
            {
                '<div class="col-12"><div class="row">/newsletter/</div></div>': ['newsletter']
            }
        ],
        EDITOR: {
            text_footer: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,RemoveFormat,CopyFormatting,NumberedList,Outdent,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Unlink,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,TextColor,BGColor,ShowBlocks,Maximize,About,BulletedList,Indent',
                colorButton_colors : colorPick,
                height : '120px'
            },
            newsletter: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,RemoveFormat,CopyFormatting,NumberedList,Outdent,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Unlink,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,TextColor,BGColor,ShowBlocks,Maximize,About,BulletedList,Indent',
                colorButton_colors : colorPick,
                height : '120px'
            }
        }
    },
};