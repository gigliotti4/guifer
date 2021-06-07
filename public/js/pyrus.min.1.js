/**
 * @param e - entidad perteneciente al array de entidades definido en declaration.js
 * @param dataPYRUS - permite completar datos TP_ENUM. { K : V }
 * @param urlFile - dirección de imagen por defecto
 * @param modify - modifica el tipo de elemento de una entidad. { K : V } - Ver archivo declaration.js para los formatos
 * -----------------------------------------/
 * Herramienta para armado de formularios
 * Cada Formulario es único, las entidades anteponen su nombre a cada FORM
 * Función que construye los names e id de los elementos del FORM
 * Las entidades con EDITOR RICO pueden configurarse en el archivo DECLARATION con valores sacados de https://ckeditor.com/latest/samples/toolbarconfigurator/index.html#advanced
 * 
 * Log más específicos
 * FOLDER para elementos TIPO ARCHIVOS
 * LINK en elementos TP_EMAIL
 * Formato moneda en elementos TP_MONEY
 * Se puede eliminar un elemento característica de la entidad
 * Doble imagen en fondo claro y oscuro, para elementos transparentes donde podían perderse con el fondo único
 * Se modificó la lista de colores de campos EDITOR
 * Identificación de los TP_FECHA y conversión a formato dd/mm/yyyy ...
 * Las imágenes tienen un campo oculto con su ubicación
 * Elemento único para links de Youtube
 * Más elementos tipo fecha
 * -----------------------------------------/
 * @date 12.2019
 * @last_change 17.12.2019
 * @version 0.2.5.0
 */
Pyrus = function ( e = null, dataPYRUS = null , urlFile = null, modify = null) {
	this.entidad = e;
    this.objeto = null;
    this.name = null;
    this.especificacion = null;
    this.objetoSimple = null;
    
    this.constructor = () => {
        console.time( "Time this" );
		if( this.entidad === null || this.entidad === "" ) {
			console.warn( "AVISO: No se ha pasado ninguna entidad. Uso limitado" );
			return false;
		}
        /* ------------------- */
        if( ENTIDADES[ this.entidad ] === undefined ) {
            console.warn( `AVISO: Entidad "${this.entidad}" no encontrada` );
			return false;
        }
        this.objeto = ENTIDADES[ this.entidad ];
        this.especificacion = this.objeto.ATRIBUTOS;
        this.name = this.objeto.TABLE === undefined ? e : this.objeto.TABLE;
        /* ------------------- */
        this.getEspecificacion();
        console.timeEnd( "Time this" );
    };
    /**
     * @deprecated
     */
    this.objetoLimpio = () => {
		let r = {};
		for( var i in this.especificacion ) {
			r[ i ] = null;
		}
		return r;
    };
    /**
     * @description Construye conjuntos de elementos de la cabecera de la tabla
     * @returns @type Array
     */
    this.columnas = () => {
        let Arr = [];
        for( let x in this.especificacion ) {
            if( this.especificacion[ x ].VISIBILIDAD != "TP_VISIBLE" && this.especificacion[ x ].VISIBILIDAD != "TP_VISIBLE_TABLE" )
                continue;
            width_ = "auto";
            class_ = "";
            name_ = x.toUpperCase();
            if( this.especificacion[ x ].NOMBRE !== undefined )
                name_ = this.especificacion[ x ].NOMBRE.toUpperCase();
            if( this.especificacion[ x ].WIDTH !== undefined && this.especificacion[ x ].TABLE === undefined )
                width_ = this.especificacion[ x ].WIDTH;
            else {
                if( this.especificacion[ x ].TABLE !== undefined )
                    width_ = this.especificacion[ x ].TABLE;
            }
            if( this.especificacion[ x ].CLASS !== undefined )
                class_ = this.especificacion[ x ].CLASS
            Arr.push( { NAME: name_ , COLUMN: x , WIDTH: width_ , CLASS: class_ } );
        }
        return Arr;
    };
    /**
     * @description Crea cabecera de tabla
     * @param columns @type array c/parámetros de la cabecera de la tabla
     * @param replace @type boolean reemplaza cabecera completa o adiciona
     * @returns string
     */
    this.table = ( columns = null , replace = false ) => {
        let columnsDATA = this.columnas();
        let tableHTML = "";

        tableHTML += `<thead class="thead-dark">`;
        if( replace ) {
            if( columns !== null ) {
                columns.forEach( function( e ) {
                    tableHTML += `<th style="width:${e.WIDTH}">${e.NAME}</th>`;
                });
            }
        } else {
                columnsDATA.forEach( function( e ) {
                    if( modify === null)
                        tableHTML += `<th style="width:${e.WIDTH}">${e.NAME}</th>`;
                    else {
                        
                        if( modify[ e.COLUMN ] === undefined)
                            tableHTML += `<th style="width:${e.WIDTH}">${e.NAME}</th>`;
                        else if( modify[ e.COLUMN ].REMOVE === undefined ) {
                            if( modify[ e.COLUMN ].VISIBILIDAD != "TP_INVISIBLE" )
                                tableHTML += `<th style="width:${e.WIDTH}">${e.NAME}</th>`;
                        }
                    }
                });
            if(columns !== null) {
                columns.forEach( function( e ) {
                    tableHTML += `<th style="width:${e.WIDTH}">${e.NAME}</th>`;
                });
            }
        }
        tableHTML += `</thead>`;

        return `<div class="table-responsive"><table id="tabla" class="table table-striped table-hover table-borderless mb-0">${tableHTML}<tbody></tbody></table></div>`;
    };
    
    this.getEspecificacion = () => {
        this.objetoSimple = {};
        this.objetoSimple[ "name" ] = this.name;
        this.objetoSimple[ "especificacion" ] = {};
        this.objetoSimple[ "detalles" ] = {};
        for( let x in this.especificacion ) {
            this.objetoSimple[ "especificacion" ][ x ] = this.especificacion[ x ].TIPO;
            switch( this.especificacion[ x ].TIPO ) {
                case "TP_FILE":
                case "TP_IMAGE":
                case "TP_BLOB":
                    this.objetoSimple[ "detalles" ][ x ] = {
                        FOLDER: this.especificacion[ x ].FOLDER === undefined ? this.name : this.especificacion[ x ].FOLDER
                    };
                    break;
                case "TP_CAST":
                    this.objetoSimple[ "detalles" ][ x ] = {
                        CAST: this.especificacion[ x ].CAST === undefined ? null : this.especificacion[ x ].CAST
                    };
                    break;
                case "TP_PASSWORD":
                    this.objetoSimple[ "detalles" ][ x ] = {
                        PASSWORD: 1
                    };
                    break;
            }
        }
        if( this.objeto.IDIOMAS !== undefined ) {
            this.objetoSimple[ "idiomas" ] = {};
            for( let x in this.objeto.IDIOMAS )
                this.objetoSimple[ "idiomas" ][ x ] = Object.keys( this.objeto.IDIOMAS[ x ].ELEMENT );
        } 
    };
    this.clean = ( CKEDITOR_ , name = null ) => {
        for( let x in this.especificacion ) {
            if( CKEDITOR_ !== null ) {
                if( CKEDITOR_.instances[ `${this.name}_${x}` ] !== undefined ) {
                    CKEDITOR_.instances[ `${this.name}_${x}` ].setData( '' );
                    continue;
                }
            }
            if( this.especificacion[ x ].TIPO == "TP_IMAGE" || this.especificacion[ x ].TIPO == "TP_BLOB" ) {
                $( `#src-${this.name}_${x}` ).attr( "src" , "" );
                $( `#src-${this.name}_${x}-2` ).attr( "src" , "" );
                continue;
            }

            if( this.especificacion[ x ].TIPO == "TP_FILE" ) {
                $( `#${this.name}_${x}` ).attr( "src" , "" );
                $( `#${this.name}_${x}_button` ).prop( "disabled" , true )
                continue;
            }

            if( this.especificacion[ x ].TIPO == "TP_CHECK" ) {
                if( $( `#${this.name}_${x}` ).is( ":checked" ) )
                    $( `#${this.name}_${x}` ).prop( "checked" , false ).trigger( "change" );
                continue;
            }

            if( $( `#${this.name}_${x}` ).length )
                $( `#${this.name}_${x}` ).val( "" );
            
            if( this.especificacion[ x ].TIPO == "TP_ENUM" || this.especificacion[ x ].TIPO == "TP_COLOR" )
                $( `#${this.name}_${x}` ).trigger( "change" );
        }
    };
    this.delete = ( t , alertify_ , url , id ) => {
        $( t ).prop( "disabled" , true );

        $( '[data-toggle="tooltip"]' ).tooltip( 'hide' );
        Swal.fire({
            title: alertify_.title,
            text: alertify_.body,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar'
        }).then( ( result ) => {
            if ( result.value ) {

                axios.delete( url, { params : { id : id } } )
                .then(function(res) {
                    if(parseInt(res.data) == 1) {
                        Swal.fire(
                            'Contenido eliminado!',
                            'Registro dado de baja.',
                            'success'
                        )
                        location.reload();
                    } else {
                        Swal.fire(
                            'Atención',
                            'Ocurrió un error al eliminar. Reintente',
                            'error'
                        )
                    }
                }).catch(function(err) {
                    $( t ).prop( "disabled" , false );
                    Swal.fire(
                        'Atención',
                        'Ocurrió un error interno.',
                        'error'
                    )
                }).then(function() {
                    $( t ).prop( "disabled" , false );
                });
            }
        });
    };
    /**
     * @type object CKEDITOR
     */
    this.editor = ( CKEDITOR_ , id = "", multiple = null ) => {
        if( this.objeto.EDITOR === undefined ) {
            console.error( "#### SIN CARACTERÍSTICAS DE EDITOR" );
            return null;
        }
        for( let x in this.objeto.EDITOR ) {
            if( this.objeto.IDIOMAS !== undefined ) {
                if( this.objeto.IDIOMAS[ x ] !== undefined ) {
                    for( let y in this.objeto.IDIOMAS[ x ].ELEMENT ) {
                        names = {
                            element : x,
                            id : id,
                            multiple : multiple,
                            idioma : y
                        };
                        Arr = this.constructorNames( names );
                        CKEDITOR_.replace( `${Arr.idElementForm}` , this.objeto.EDITOR[ x ] );            
                    }
                    continue;
                }
            }
            names = {
                element : x,
                id : id,
                multiple : multiple
            };
            Arr = this.constructorNames( names );
            CKEDITOR_.replace( `${Arr.idElementForm}` , this.objeto.EDITOR[ x ] );
        }
    };
    this.card = ( url , data , buttonsOK = [ "c" , "e" , "d" ] ) => {
        let html = "";
        let dataAUX = data;
        if( data === null ) {
            console.error( "#### SIN ELEMENTOS - En la base ####" );
            return null;
        }
        if( data.current_page !== undefined ) {
            data = data.data;
            dataAUX = data;
            console.warn( "### PAGINADO ACTIVO ####" );    
        }
        console.info( "### CONSTRUYENDO CARDS ####" );
        
        if( !Array.isArray(data) )
            dataAUX = Object.keys( data );

        formatter = new Intl.NumberFormat('es-AR', {
            style: 'currency',
            currency: 'ARS',
        });
        dataAUX.forEach( ( x ) => {
            row = [];
            id = null;
            if( !Array.isArray(data) ) {
                id = x;
                x = data[ x ];
            } else {
                if( x.id !== undefined )
                    id = x.id;
            }
            this.columnas().forEach( ( column ) => {
                element = x[ column.COLUMN ] === null ? "" : x[ column.COLUMN ];
                image = null;
                cardBody = "";
                if( element === undefined ) element = id;
                if( this.especificacion[ column.COLUMN ].TIPO == "TP_BLOB" ) {
                    img = `data:${x.mime};base64,${element}`;
                    image = `<img class="card-img-top p-3" src="${img}" onerror="this.src='${src}'"/>`;
                }
                if( this.especificacion[ column.COLUMN ].TIPO == "TP_IMAGE" ) {
                    date = new Date();
                    info = element.d;
                    if( typeof element == "object" )
                        element = element.i;
                    imgURL = element == "" ? element : `${url}/${element}`;
                    img = element == "" ? element : `${url}/${element}?t=${date.getTime()}`;
                    image = `<img class="card-img-top p-3" src="${img}" onerror="this.src='${src}'"/>`;
                    if( info !== undefined ) {
                        cardBody += `<p class="text-center mx-auto mt-2"><strong class="mr-1">Dimensiones:</strong>${info[ 0 ]}px x ${info[ 1 ]}px</p>`;
                        cardBody += `<p class="text-center mx-auto mt-1"><strong class="mr-1">Tipo:</strong>${info.mime}</p>`;
                        cardBody += `<p class="text-center mx-auto mt-1"><strong class="mr-1 text-truncate">URL:</strong>${imgURL}</p>`;
                        cardBody += `<p class="text-center mx-auto mt-1 d-flex justify-content-center flex-wrap align-items-center">`;
                            cardBody += `<a href="${imgURL}" target="blank"><i class="fas fa-external-link-alt"></i></a>`;
                            cardBody += `<a onclick="copy( this , '${imgURL}' )" href="#" class="ml-1"><i style="cursor:pointer;" class="far fa-copy"></i></a>`;
                            cardBody += `<a href="${imgURL}" download class="ml-1"><i class="fas fa-download"></i></a>`;
                        cardBody += `</p>`;
                    }
                }
                html += `<div class="card">`;
                    html += `${image}`;
                    html += `<div class="card-body">${cardBody}</div>`;
                    html += `<div class="card-footer">`;
                        html += `<div class="d-flex justify-content-center">`;
                        if( buttonsOK.indexOf( "c" ) >= 0 )
                            html += `<button data-toggle="tooltip" data-placement="left" title="Copiar elemento" style="font-size: 12px;" onclick="clone(this,'${id}')" class="btn text-center btn-info rounded-0" disabled><i class="far fa-clone"></i></button>`;
                        if( buttonsOK.indexOf( "e" ) >= 0 )
                            html += `<button data-toggle="tooltip" data-placement="left" title="Editar elemento" style="font-size: 12px;" onclick="edit(this,'${id}')" class="btn text-center rounded-0 btn-warning"><i class="fas fa-pencil-alt"></i></button>`;
                        if( buttonsOK.indexOf( "d" ) >= 0 )
                            html += `<button style="font-size: 12px;" data-toggle="tooltip" data-placement="left" title="Eliminar elemento" onclick="erase(this,'${id}')" class="btn text-center rounded-0 btn-danger"><i class="fas fa-trash-alt"></i></button>`;
                        html += `</div>`;
                    html += `</div>`;
                html += `</div>`;
            });
        });
        return html;
    };
    /**
     * @type object target
     * @type string url - url base
     * @type object / array data
     * @var button @type object @description elemento tipo objeto que contiene las características de un boton. Función que dispara, color e ícono
     */
    this.elements = ( target , url , data , buttonsOK = [ "c" , "e" , "d" ] , button = null ) => {
        let dataAUX = data;
        if( data === null ) {
            console.error( "#### SIN ELEMENTOS - En la base ####" );
            return null;
        }
        if( window.usr_data !== undefined ) {
            if( parseInt( window.usr_data.is_admin ) > 1 ) {
                i = buttonsOK.indexOf( "d" );
                buttonsOK.splice( i , 1 );
            }
        }
        if( data.current_page !== undefined ) {
            data = data.data;
            dataAUX = data;
            console.warn( "### PAGINADO ACTIVO ####" );    
        }
        console.info( "### CONSTRUYENDO TABLA ####" );

        if( !Array.isArray(data) )
            dataAUX = Object.keys( data );
        
        if( !target.find( "tbody" ).length )
            target.append( "<tbody></tbody>" );
        
        formatter = new Intl.NumberFormat('es-AR', {
            style: 'currency',
            currency: 'ARS',
        });
        dataAUX.forEach( function( x ) {
            row = [];
            id = null;
            if( !Array.isArray(data) ) {
                id = x;
                x = data[ x ];
            } else {
                if( x.id !== undefined )
                    id = x.id;
            }
            this.columnas().forEach( function( column ) {
                element = x[ column.COLUMN ] === null ? "" : x[ column.COLUMN ];
                if( element === undefined ) element = id;
                if( this.especificacion[ column.COLUMN ].TIPO == "TP_BLOB" ) {
                    img = `data:${x.mime};base64,${element}`;
                    element = `<img class="w-100" src="${img}" onerror="this.src='${src}'"/>`;
                }
                if( this.especificacion[ column.COLUMN ].TIPO == "TP_IMAGE" ) {
                    date = new Date();
                    info = element.d;
                    if( typeof element == "object" )
                        element = element.i;
                    imgURL = element == "" ? element : `${url}/${element}`;
                    img = element == "" ? element : `${url}/${element}?t=${date.getTime()}`;
                    w = window.pyrus.especificacion[ column.COLUMN ].WIDTH === undefined ? "auto" : ( window.pyrus.especificacion[ column.COLUMN ].TABLE !== undefined ? window.pyrus.especificacion[ column.COLUMN ].TABLE : window.pyrus.especificacion[ column.COLUMN ].WIDTH );
                    element = `<img style="width: ${w};" class="d-block mx-auto" src="${img}" onerror="this.src='${src}'"/>`;
                    if( info !== undefined ) {
                        element += `<p class="text-center mx-auto mt-2"><strong class="mr-1">Dimensiones:</strong>${info[ 0 ]}px x ${info[ 1 ]}px</p>`;
                        element += `<p class="text-center mx-auto mt-1"><strong class="mr-1">Tipo:</strong>${info.mime}</p>`;
                        element += `<p class="text-center mx-auto mt-1"><strong class="mr-1 text-truncate">URL:</strong>${imgURL}</p>`;
                        element += `<p class="text-center mx-auto mt-1 d-flex justify-content-center flex-wrap align-items-center">`;
                            element += `<a href="${imgURL}" target="blank"><i class="fas fa-external-link-alt"></i></a>`;
                            element += `<a onclick="copy( this , '${imgURL}' )" href="#" class="ml-1"><i style="cursor:pointer;" class="far fa-copy"></i></a>`;
                            element += `<a href="${imgURL}" download class="ml-1"><i class="fas fa-download"></i></a>`;
                        element += `</p>`;
                    }
                }
                if( this.especificacion[ column.COLUMN ].TIPO == "TP_ARRAY" ) {
                    element = x[ this.especificacion[ column.COLUMN ].COLUMN ];
                    if( element !== null && element !== undefined )
                        element = element.length;
                    else
                        element = 0;
                }
                if( this.especificacion[ column.COLUMN].TIPO == "TP_CHECK" ) {
                    if( this.especificacion[ column.COLUMN].OPTION !== undefined ) {
                        if( this.especificacion[ column.COLUMN].OPTION[ element ] !== undefined )
                            element = this.especificacion[ column.COLUMN].OPTION[ element ];
                    }
                }
                if( this.especificacion[ column.COLUMN ].TIPO == "TP_YOUTUBE") {
                    if( element != "" ) {
                        y = `https://www.youtube.com/watch?v=${element}`;
                        element = `<iframe class="w-100 h-100" src="https://www.youtube.com/embed/${element}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
                        element = `<p class="text-center"><a class="text-primary mb-2" href="${y}" target="blank">${y}</a><i class="fas fa-external-link-alt ml-2"></i></p>${element}`;
                    }
                }
                if( this.especificacion[ column.COLUMN ].TIPO == "TP_FILE") {
                    if(element != "")
                        element = `<a href="${url}/${element.i}" target="_blank" class="text-primary">${element.i}</a><i class="fas fa-external-link-alt ml-2"></i>`;
                    else
                        element = `SIN ${this.especificacion[ column.COLUMN ].NOMBRE}`;
                }
                if( this.especificacion[ column.COLUMN ].TIPO == "TP_COLOR") {
                    if(element != "")
                        element = `<p>${element}</p><div class="mt-2" style="height: 10px; background-color: ${element}"></div>`;
                }
                if( this.especificacion[ column.COLUMN ].TIPO == "TP_LINK") {
                    if(element != "")
                        element = `<a href="${element}" target="_blank" class="text-primary">${element}</a><i class="fas fa-external-link-alt ml-2"></i>`;
                }
                if( this.especificacion[ column.COLUMN ].TIPO == "TP_EMAIL" ) {
                    if(element != "")
                        element = `<a href="mailto:${element}" target="_blank" class="text-primary">${element}</a><i class="fas fa-external-link-alt ml-2"></i>`;
                }
                if( this.especificacion[ column.COLUMN ].TIPO == "TP_FECHA" ) {
                    if( element != "" )
                        element = dates.string( dates.convert( element ) , this.especificacion[ column.COLUMN ].FORMAT === undefined ? [ "dd" , "mm" , "aaaa" , "h" , "m" , "s" ] : this.especificacion[ column.COLUMN ].FORMAT );
                    else
                        element = "-";
                }
                if( this.especificacion[ column.COLUMN ].TIPO == "TP_MONEY" )
                    element = formatter.format(element)
                if( this.especificacion[ column.COLUMN ].TIPO == "TP_ENUM" ) {
                    if( this.especificacion[ column.COLUMN ].ENUM !== undefined )
                        element = this.especificacion[ column.COLUMN ].ENUM[ element ];
                    else {
                        if( dataPYRUS !== null ) {
                            if( dataPYRUS[  column.COLUMN ] !== undefined ) {
                                if( dataPYRUS[  column.COLUMN ].DATA[ element ] !== undefined ) {
                                    if( !isNaN( element ) )
                                        element = parseInt( element );
                                    element = dataPYRUS[  column.COLUMN ].DATA[ element ];
                                    if( typeof element == "object" ) {
                                        if( ENTIDADES[ this.especificacion[ column.COLUMN ].RELACION.E ].IDIOMAS !== undefined ) {
                                            if( ENTIDADES[ this.especificacion[ column.COLUMN ].RELACION.E ].IDIOMAS[ this.especificacion[ column.COLUMN ].RELACION.A ] !== undefined ) {
                                                table = '<div class="mt-n2">';
                                                for( let t in ENTIDADES[ this.especificacion[ column.COLUMN ].RELACION.E ].IDIOMAS[ this.especificacion[ column.COLUMN ].RELACION.A ].ELEMENT ) {
                                                    table += '<div class="row mt-2">';
                                                        table += `<div class="col-12 col-md text-uppercase">${ENTIDADES[ this.especificacion[ column.COLUMN ].RELACION.E ].IDIOMAS[ this.especificacion[ column.COLUMN ].RELACION.A ].ELEMENT[ t ]}</div>`;
                                                        table += `<div class="col-12 col-md">${element[ t ]}</div>`
                                                    table += '</div>';
                                                }
                                                table += '</div>';
        
                                                element = table;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                if( typeof element == "object" ) {
                    if( this.objeto.IDIOMAS !== undefined ) {
                        if( this.objeto.IDIOMAS[ column.COLUMN ] !== undefined ) {
                            table = '<div class="row">';
                                for( let t in this.objeto.IDIOMAS[ column.COLUMN ].ELEMENT )
                                    table += `<div class="col-12 col-md text-uppercase">${this.objeto.IDIOMAS[ column.COLUMN ].ELEMENT[ t ]}</div>`;
                            table += '</div>';
                            table += '<div class="row">';
                                for( let t in this.objeto.IDIOMAS[ column.COLUMN ].ELEMENT )
                                    table += `<div class="col-12 col-md">${element[ t ]}</div>`
                            table += '</div>';

                            element = table;
                        }
                    }
                }
                row.push( `<td class="${column.CLASS}">${element}</td>` );
            } , this );
            if( buttonsOK.length != 0 || button !== null ) {
                buttons = `<td class="text-center" style="width:200px; max-with: 200px">`;
                    buttons += `<div class="d-flex justify-content-center">`;
                    if( buttonsOK.indexOf( "c" ) >= 0 )
                        buttons += `<button data-toggle="tooltip" data-placement="left" title="Copiar elemento" style="font-size: 12px;" onclick="clone(this,'${id}')" class="btn text-center btn-info rounded-0" disabled><i class="far fa-clone"></i></button>`;
                    if( buttonsOK.indexOf( "e" ) >= 0 )
                        buttons += `<button data-toggle="tooltip" data-placement="left" title="Editar elemento" style="font-size: 12px;" onclick="edit(this,'${id}')" class="btn text-center rounded-0 btn-warning"><i class="fas fa-pencil-alt"></i></button>`;
                    if( buttonsOK.indexOf( "d" ) >= 0 )
                        buttons += `<button style="font-size: 12px;" data-toggle="tooltip" data-placement="left" title="Eliminar elemento" onclick="erase(this,'${id}')" class="btn text-center rounded-0 btn-danger"><i class="fas fa-trash-alt"></i></button>`;
                    if( button !== null ) {
                        button.forEach( function( b ) {
                            buttons += `<button data-toggle="tooltip" data-placement="left" title="${b.title}" style="font-size: 12px;" onclick="${b.function}Function(this,'${id}')" class="btn text-center rounded-0 ${b.class}">${b.icon}</button>`;
                        });
                    }
                    buttons += `</div>`;
                buttons += `</td>`;
                row.push( buttons );
            }

            target.find("tbody").append(`<tr data-id="${id}">${row.join( "" )}</tr>`);
        } , this );
    };
    this.one = ( url , callbackOK , callbackFail = null ) => {
        axios.get( url, {
            responseType: 'json'
        })
        .then(function( res ) {
            callbackOK.call( this , res );
        })
        .catch(function(err) {
            if( callbackFail !== null )
                callbackFail.call( this , err );
        })
        .then(function() {});
    };
    this.show = ( CKEDITOR_ , url , data , identifierNAME = null , identifier = null ) => {
        if( data === null ) {
            console.warn( `### SIN DATOS ###` );
            return null;
        }
        console.group();
        console.info( `### COMPLETANDO FORMULARIO ###` );
        console.table( [ { Entidad : this.entidad } ] );
        console.groupEnd();
        for( let x in this.especificacion ) {
            if( data[ x ] === undefined ) continue;
            if( this.especificacion[ x ].TIPO == "TP_PASSWORD" ) continue;
            if( this.objeto.IDIOMAS !== undefined ) {
                if( this.objeto.IDIOMAS[ x ] !== undefined ) {
                    for( let y in this.objeto.IDIOMAS[ x ].ELEMENT ) {
                        names = {
                            element : x,
                            id : identifierNAME,
                            multiple : identifier,
                            idioma : y
                        };
                        Arr = this.constructorNames( names );
                        name = Arr.idElementForm;
                        if( !$( `#${name}` ).length ) continue;
                        if( CKEDITOR_ !== null ) {
                            if( CKEDITOR_.instances[ name ] !== undefined ) {
                                if( data[ x ] !== null ) {
                                    if( data[ x ][ y ] !== null )
                                        CKEDITOR_.instances[ name ].setData( data[ x ][ y ] );
                                }
                                continue;
                            }
                        }
                        if( this.especificacion[ x ].TIPO == "TP_FILE" ) {
                            if( data[ x ] !== null ) {
                                file = data[ x ][ y ];
                                if( file !== null )
                                    $( `#${name}_button` ).prop( "disabled" , false );
                            }
                            continue;
                        }
                        if( this.especificacion[ x ].TIPO == "TP_IMAGE" ) {
                            date = new Date();
                            image = data[ x ][ y ];
                            img = "";
                            if( image !== null ) {
                                if( typeof image == "object" )
                                    image = image.i;
                                img = `${url}${image}`;
                            }
                            if( img != "" ) {
                                $( `#${Arr.idURLForm}` ).val( img );
                                img += `?t=${date.getTime()}`;

                                $( `#src-${name}` ).attr( "src" , img );
                                $( `#src-${name}` ).data( "src" , img );
                                $( `#src-${name}-2` ).attr( "src" , img );
                                $( `#src-${name}-2` ).data( "src" , img );
                            }
                            continue;
                        }
                        if( this.especificacion[x].TIPO == "TP_CHECK" ) {
                            if( data[ x ][ y ] !== null ) {
                                $( `#${name}` ).prop( "checked" , true );
                                $( `#${name}_input` ).val( 1 );
                            }
                            continue;
                        }
                        if( this.especificacion[x].TIPO == "TP_ENUM" ) {
                            if( data[ x ] !== null ) {
                                if( data[ x ][ y ] !== null )
                                    $( `#${name}` ).val( data[ x ][ y ] ).trigger( "change" ); 
                            }
                            continue;
                        }
                        if( data[ x ] !== null ) {
                            if( data[ x ][ y ] !== null )
                                $( `#${name}` ).val( data[ x ][ y ] ).trigger( "change" );
                        }
                    }
                    continue;
                }
            }
            names = {
                element : x,
                id : identifierNAME,
                multiple : identifier
            };
            Arr = this.constructorNames( names );
            
            name = Arr.idElementForm;
            if( CKEDITOR_ !== null ) {
                if( CKEDITOR_.instances[ name ] !== undefined ) {
                    CKEDITOR_.instances[ name ].setData( data[ x ] );
                    continue;
                }
            }
            if( this.especificacion[ x ].TIPO == "TP_FILE" ) {
                file = data[ x ];
                if( file !== null ) {
                    link = `<a target="blank" class="text-primary" href="${url_simple}/${file.i}">${url_simple}/${file.i}</a>`;
                    f = `<p class="w-100"><strong>Extensión:</strong> ${file.e.toUpperCase()}</p>`;
                    f += `<p class="text-truncate w-100"><strong>Link:</strong> ${link}</p>`;
                    $( `#${name}` ).closest( ".input-group" ).find( "+ .input-group-text" ).html( f )
                }
                continue;
            }
            if( this.especificacion[ x ].TIPO == "TP_BLOB" ) {
                element = `data:${data.mime};base64,${data[ x ]}`;
                $( `#src-${name}` ).attr( "src" , element );
                $( `#src-${name}-2` ).attr( "src" , element );
                continue;
            }
            if( this.especificacion[ x ].TIPO == "TP_IMAGE" ) {
                date = new Date();
                image = data[ x ];
                img = "";
                if( image !== null ) {
                    if( typeof image == "object" )
                        image = image.i;
                    if( url.substr(-1) != "/" )
                        url += "/";
                    img = `${url}${image}`;
                }
                if( img != "" ) {
                    $( `#${Arr.idURLForm}` ).val( img );
                    img += `?t=${date.getTime()}`;
                    $( `#src-${name}` ).attr( "src" , img );
                    $( `#src-${name}` ).data( "src" , img );
                    $( `#src-${name}-2` ).attr( "src" , img );
                    $( `#src-${name}-2` ).data( "src" , img );
                }
                continue;
            }
            if( this.especificacion[x].TIPO == "TP_CHECK" ) {
                if( data[ x ] !== null ) {
                    $( `#${name}` ).prop( "checked" , true );
                    $( `#${name}_input` ).val( 1 );
                }
                continue;
            }
            
            if( this.especificacion[x].TIPO == "TP_ENUM" ) {
                if( this.especificacion[x].NOT_TRIGGER === undefined )
                    $( `#${name}` ).val( data[ x ] ).trigger( "change" );
                else
                    $( `#${name}` ).val( data[ x ] );
                if( $( `#${name}.selectpicker` ).length )
                    $( `#${name}.selectpicker` ).selectpicker( 'refresh' );
                continue;
            }
            if( this.especificacion[x].TIPO == "TP_FECHA" ) {
                if( data[ x ] !== null ) {
                    element = dates.string( dates.convert( data[ x ] ) , [ "aaaa" , "-" , "mm" , "-" , "dd" ] );
                    console.log(element)
                    $( `#${name}` ).val( element ).trigger( "change" );
                }
                continue;
            }
            $( `#${name}` ).val( data[ x ] ).trigger( "change" );
        }
    };
    this.formulario = ( id = "" , multiple = null ) => {
        if( this.objeto === null )
            return "";
        console.group();
        console.info( `### CONSTRUYENDO FORMULARIO ###` );
        console.table( [ { Entidad : this.entidad } ] );
        console.groupEnd();

        if( this.objeto[ 'FORM' ] === undefined )
            return "";
        try {
            let formulario = "";
            let OBJ_funciones = {}
            let ARR_form = Object.assign([], this.objeto['FORM']);
    
            if (this.objeto['FORM_CLASS'] === undefined) this.objeto['FORM_CLASS'] = 'form-control';
            let STR_class = this.objeto['FORM_CLASS'];
    
            if (this.objeto['FUNCIONES'] !== undefined) OBJ_funciones = this.objeto['FUNCIONES'];
            
            ARR_form.forEach( function( rowElements ) {
                for(let i in rowElements) {
                    let row = i;
                    let rowElementos = rowElements[i];
                    let TEXT_row = "";
                    TEXT_row += '<div class="row justify-content-center">';
                    rowElementos.forEach( function( e ) {
                        if(this.especificacion[e] === undefined && e != "BTN") {
                            console.warn(`ELEMENTO "${e}" NO ENCONTRADO *** Revise declaration.js`);
                            return false;
                        }
    
                        let aux = "";
                        let AUX_nombre = e + (id != "" ? `_${id}` : "");
                        let OBJ_funcion = {};
                        
                        if (OBJ_funciones[e] !== undefined)
                            OBJ_funcion = this.objeto['FUNCIONES'][e];
                        if(e == "VACIO") {
                            auxHTML = row;
                        } else if(e == "BTN") {
                            if(this.objeto.BTN !== undefined) {
                                aux = `<button class="${this.objeto.BTN.class}">${this.objeto.BTN.titulo} ${this.objeto.BTN.icono}</button>`
                            }
                        } else {
                            especificacion = this.especificacion[e]
                            if( modify !== null ) {
                                if( modify[ e ] !== undefined )
                                    especificacion = modify[ e ];
                            }
                            if( especificacion.REMOVE === undefined ) {
                                aux = this.inputAdecuado(especificacion, e, id, STR_class, OBJ_funcion, especificacion.PLACEHOLDER === undefined ? "" : especificacion.PLACEHOLDER, multiple , e );
                                if(this.objeto.PLACEHOLDER !== undefined) {
                                    aux += `<label for="">${especificacion.PLACEHOLDER === undefined ? especificacion.NOMBRE : especificacion.PLACEHOLDER}</label>`;
                                }
                                if(especificacion.AYUDA !== undefined)
                                    aux += `<small class="form-text text-muted">${especificacion.AYUDA}</small>`;
                                
                                if((especificacion.TIPO == "TP_FECHA" && especificacion.SIMPLE === undefined) || (especificacion.MULTIPLE !== undefined && especificacion.MULTIPLE))
                                    aux = `<label class="" for="${AUX_nombre}">${especificacion.NOMBRE}</label>` + aux;
                                
                                if( this.objeto.IDIOMAS !== undefined ) {
                                    if( this.objeto.IDIOMAS[e] !== undefined ) {
                                        aux = '<div class="row justify-content-center align-items-center">';
                                        for( let j in this.objeto.IDIOMAS[ e ].ELEMENT ) {
                                            placeholder = especificacion.NOMBRE === undefined ? e : especificacion.NOMBRE;
                                            placeholder = placeholder.toUpperCase();
                                            placeholder += ` ${this.objeto.IDIOMAS[ e ].ELEMENT[ j ]}`;
                                            
                                            auxR = this.objeto.IDIOMAS[ e ].FORM;
                                            auxX = this.inputAdecuado(especificacion, `${e}_${j}`, id, STR_class, OBJ_funcion, placeholder , multiple , e );
                                            if(this.objeto.PLACEHOLDER !== undefined)
                                                auxX += `<label for="">${especificacion.PLACEHOLDER === undefined ? especificacion.NOMBRE : especificacion.PLACEHOLDER}</label>`;
                                            if(especificacion.AYUDA !== undefined)
                                                auxX += `<small class="form-text text-muted">${especificacion.AYUDA}</small>`;
                                            auxR = auxR.replace(`/${e}/`,auxX);
                                            aux += auxR;
                                        }
                                        aux += '</div>';
                                    }
                                }
                            } else
                                row = "";
                            //auxHTML = row;
                        }
                        //if(auxHTML == "") auxHTML = row;
    
                        if(row.indexOf(e) >= 0)
                            row = row.replace(`/${e}/`,aux);
                    }, this);
                    TEXT_row += row;
                    
                    TEXT_row += '</div>';
                    formulario += TEXT_row;
                }
            }, this);
            if( multiple !== null )
                formulario = `<input type="hidden" value="" name="${this.name}_${multiple}[]"/>${formulario}`;
            
            return `<div class="contenedorForm w-100" id="form_${this.entidad + (id != "" ? "_" + id : "")}">${formulario}</div>`;
        } catch (error) {
            console.group();
            console.error( "#### ERROR en el formato" );
            console.error( error );
            console.table( [ { Ver : 'Verificar declaration.js v:2', Entidad : this.entidad } ] );
            console.groupEnd();
            return "Error en el armado";
        }
    };
    /**
     * 
     */
    this.inputAdecuado = ( Object_ , element_name , id_name , STR_class , OBJ_funcion , placeholder , multiple_name = null , e ) => {
        let names = {
            element : element_name,
            id : id_name,
            multiple : multiple_name
        };
        
        if( Object_.NOMBRE === undefined )
            Object_.NOMBRE = element_name;
        if( Object_.NAME === undefined )
            Object_.NAME = element_name;
        if( placeholder === undefined )
            placeholder = "";
        if( this.objeto.MINUSCULA === undefined )
            Object_.NOMBRE = (Object_.NOMBRE).toUpperCase();
    
        if( Object_.VISIBILIDAD == 'TP_VISIBLE' || Object_.VISIBILIDAD == 'TP_VISIBLE_FORM' ) {
            switch( Object_.TIPO ) {
                case 'TP_ENTERO':
                    return this.inputString( Object_ , names , "number" , STR_class , OBJ_funcion , placeholder );
                case 'TP_LINK':
                    return this.inputString( Object_ , names , "url" , STR_class , OBJ_funcion , placeholder );
                case 'TP_CHECK':
                    return this.check( Object_ , names ,STR_class,OBJ_funcion );
                case 'TP_MONEY':
                    return this.money( Object_ , names ,STR_class,OBJ_funcion,placeholder );
                case 'TP_PHONE':
                    return this.inputString( Object_ , names , "phone" , STR_class , OBJ_funcion , placeholder );
                case 'TP_EMAIL':
                    return this.inputString( Object_ , names , "email" , STR_class , OBJ_funcion , placeholder );
                case 'TP_COLOR':
                    return this.inputColor( Object_ , names , STR_class , OBJ_funcion , placeholder );
                case 'TP_IMAGE':
                case 'TP_BLOB':
                    return this.inputString( Object_ , names , "file" , STR_class , OBJ_funcion , placeholder );
                case 'TP_FILE':
                    return this.inputString( Object_ , names , "file" , STR_class , OBJ_funcion , placeholder );
                case 'TP_STRING':
                    return this.inputString( Object_ , names , "text" , STR_class , OBJ_funcion , placeholder );
                case 'TP_TEXT':
                    return this.inputText( Object_ , names , STR_class , OBJ_funcion , placeholder );
                case 'TP_FECHA':
                    return this.inputString( Object_ , names , "date" , STR_class , OBJ_funcion , placeholder );
                case 'TP_PASSWORD':
                    return this.inputString( Object_ , names , "password" , STR_class , OBJ_funcion , placeholder );
                case 'TP_ENUM':
                    return this.select( Object_ , names , STR_class , OBJ_funcion , placeholder );
                default:
                    return this.inputString( Object_ , names , "text" , STR_class , OBJ_funcion , placeholder );
            }
        } else return this.inputHidden( Object_ , names );
    };
    /**
     * @var names @type object
     * @var addName @type string
     */
    /**
     * @var names @type object
     * @var addName @type string
     */
    this.constructorNames = ( names , addName = null ) => {
        let Arr = {};
        
        Arr.nameElementForm = `${this.name}_${names.element}`;
        Arr.idElementForm = `${this.name}_${names.element}`;
        
        Arr.nameURLForm = `${this.name}_${names.element}_URL`;
        Arr.idURLForm = `${this.name}_${names.element}_URL`;

        if( names.idioma !== undefined ) {
            Arr.nameElementForm += `_${names.idioma}`;
            Arr.idElementForm += `_${names.idioma}`;
        }
        if( addName !== null ) {
            Arr[ `${addName}NameElementForm`] = `${this.name}_${names.element}_${addName}`;
            Arr[ `${addName}ElementForm`] = `${this.name}_${names.element}_${addName}`;
            if( names.idioma !== undefined ) {
                Arr[ `${addName}NameElementForm`] += `_${names.idioma}`;
                Arr[ `${addName}ElementForm`] += `_${names.idioma}`;
            }
        }
        
        if( names.multiple !== null ) {
            if( addName !== null ) {
                Arr[ `${addName}NameElementForm`] = `${this.name}_${names.multiple}_${names.element}`;
                Arr[ `${addName}ElementForm`] = `${this.name}_${names.multiple}_${names.element}`;

                if( names.idioma !== undefined ) {
                    Arr[ `${addName}NameElementForm`] += `_${names.idioma}`;
                    Arr[ `${addName}ElementForm`] += `_${names.idioma}`;
                }
            }

            Arr.nameElementForm = `${this.name}_${names.multiple}_${names.element}`;
            Arr.idElementForm = `${this.name}_${names.multiple}_${names.element}`;
            
            Arr.nameURLForm = `${this.name}_${names.multiple}_${names.element}_URL`;
            Arr.idURLForm = `${this.name}_${names.multiple}_${names.element}_URL`;

            if( names.idioma !== undefined ) {
                Arr.nameElementForm += `_${names.idioma}`;
                Arr.idElementForm += `_${names.idioma}`;
            }
        }
        if( names.id !== null ) {
            if( names.id != "" ) {
                if( names.multiple !== null ) {
                    if( names.idioma !== undefined )
                        Arr.nameElementForm += `_${names.idioma}`;
                    Arr.nameElementForm += `[]`;
                    Arr.nameURLForm += `[]`;
                } else {
                    Arr.nameElementForm += `_${names.id}`;
                    Arr.nameURLForm += `_${names.id}`;

                    if( names.idioma !== undefined )
                        Arr.nameElementForm += `_${names.idioma}`;
                }
                Arr.idElementForm += `_${names.id}`;
                Arr.idURLForm += `_${names.id}`;
                //if( names.idioma !== undefined )
                    //Arr.idElementForm += `_${names.idioma}`;
                
                if( addName !== null ) {
                    Arr[ `${addName}NameElementForm`] += `_${addName}[]`;
                    Arr[ `${addName}ElementForm`] += `_${names.id}_${addName}`;
                }
            }
        }
        
        return Arr;
    };
    /**
     * @var function_ @type object
     */
    this.constructorFunction = ( function_ , STR_id ) => {
        let aux = "";
        if(function_ === null) return null;

        for( let i in function_ ) {
            if( typeof function_[ i ] == "string" ) {
                if( aux != "" ) aux += " ";
                aux += `${i}="${function_[ i ]}"`;
            } else {
                if( aux != "" ) aux += " ";
                let auxFunction = function_[ i ].F;
                auxFunction = auxFunction.replace(`/${function_[ i ].C}/`,`src-${STR_id}`);
                
                aux += `${i}="${auxFunction}"`;
            }
        }
        return aux;
    };
    
    this.check = ( OBJ_elemento , names , STR_class , OBJ_funcion = null ) => {
        let STR_funcion = "";
        let necesario = 0;
        let inputData = "";
        let input = "";
		if(OBJ_elemento.NECESARIO !== undefined) necesario = OBJ_elemento.NECESARIO;
        if(OBJ_elemento.DISABLED === undefined) OBJ_elemento.DISABLED = 0;

        if(STR_class == "form-control") STR_class = "";
        if(STR_class != "") STR_class += " ";
        if(OBJ_elemento.CLASS !== undefined) {
            if(STR_class != "") STR_class += " ";
            STR_class += OBJ_elemento.CLASS;
        }
        if(necesario)
            inputData = "required='true'";

        Arr = this.constructorNames( names , 'input' );
        STR_funcion = this.constructorFunction( OBJ_funcion , Arr.idElementForm );
        if( STR_funcion == "" )
            STR_funcion = 'onchange="check( this );"';
        if(inputData != "") inputData += " ";
        inputData += STR_funcion;

        input += `<div class="form-check">`;
            input += `<input value="${OBJ_elemento.DEFAULT !== undefined ? OBJ_elemento.DEFAULT : '1'}" ${(OBJ_elemento["DISABLED"] ? "disabled='true'" : "")} ${inputData} name="${Arr.nameElementForm}" id="${Arr.idElementForm}" class="${STR_class}" type="checkbox" >`;
            input += `<input name="${Arr.inputNameElementForm}" value="0" id="${Arr.inputElementForm}" type="hidden" >`;
            input += `<label class="form-check-label ml-2" for="${Arr.nameElementForm}">${OBJ_elemento.CHECK}</label>`;
        input += `</div>`;

        return input;
    };
    this.inputHidden = ( Object_ , names ) => {
        Arr = this.constructorNames( names );
        return `<input value="${Object_.DEFAULT !== undefined ? Object_.DEFAULT : ''}" name="${Arr.nameElementForm}" id="${Arr.idElementForm}" type="hidden" />`;
    };

    this.money = ( Object_ , names , STR_class , OBJ_funcion = null , placeholder = "" ) => {
        let STR_funcion = "";
        let inputData = "";
		if( Object_.NECESARIO === undefined ) Object_.NECESARIO = 0;
        if( Object_.DISABLED === undefined ) Object_.DISABLED = 0;
        if( Object_.LABEL === undefined ) Object_.LABEL = 0;
        
        if( STR_class != "" ) STR_class += " ";
        
        if( Object_.CLASS !== undefined ) {
            if( STR_class != "" ) STR_class += " ";
            STR_class += Object_.CLASS;
        }
        if( Object_.NECESARIO )
            inputData = "required='true'";
        if( Object_.MAXLENGTH !== undefined ) {
            if( inputData != "" ) inputData += " ";
            inputData += `maxlength="${Object_.MAXLENGTH}"`;
        }
        Arr = this.constructorNames( names , 'button' );
        
        STR_funcion = this.constructorFunction( OBJ_funcion , Arr.idElementForm );
        
        if( STR_funcion !== null ) {
            if( inputData != "" )
                inputData += " ";
            inputData += STR_funcion;
        }       
        input = `<input value="${Object_.DEFAULT !== undefined ? Object_.DEFAULT : ''}" ${(Object_["DISABLED"] ? "disabled='true'" : "")} ${Object_.READONLY === undefined ? '' : 'readonly'} ${inputData} name="${Arr.nameElementForm}" id="${Arr.idElementForm}" class="${STR_class} maskMoney" type="text" data-symbol="$ " data-thousands="." data-decimal="," placeholder="${placeholder == "" ? Object_["NOMBRE"] : placeholder}" />`;
   
        if( Object_.HELP !== undefined )
            input += `<small class="form-text text-muted">${Object_.HELP}</small>`
        if(Object_.LABEL)
            input = `<div class="form-label-group mb-0">${input}<label for="${Arr.idElementForm}" class="form-adm">${placeholder == "" ? Object_["NOMBRE"] : placeholder}</label></div>`;
        if(Object_.FIELDSET !== undefined)
            return `<fieldset><legend>${placeholder == "" ? Object_.NOMBRE : placeholder}</legend>${input}</fieldset>`;
        return input;
    };
    this.inputString = ( Object_ , names , STR_type , STR_class , OBJ_funcion = null , placeholder = "" ) => {
        let STR_funcion = "";
        let inputData = "";
		if( Object_.NECESARIO === undefined ) Object_.NECESARIO = 0;
        if( Object_.DISABLED === undefined ) Object_.DISABLED = 0;
        if( Object_.LABEL === undefined ) Object_.LABEL = 0;
        
        if( STR_class != "" ) STR_class += " ";
        switch ( STR_type ) {
            case "number":
                if( Object_.SIMPLE === undefined )
                    STR_type = "text";
                STR_class += " texto-numero text-right";
            break;
            case "password":
                STR_class += " texto-password";
            break;
            case "text":
                STR_class += " texto-text";
            break;
            case "date":
                STR_class += " texto-date";
                break;
            case "file":
                STR_class += " custom-file-input invalid";
                break;
        }
        if( Object_.CLASS !== undefined ) {
            if( STR_class != "" ) STR_class += " ";
            STR_class += Object_.CLASS;
        }
        if( Object_.NECESARIO )
            inputData = "required='true'";
        if( Object_.MAXLENGTH !== undefined ) {
            if( inputData != "" ) inputData += " ";
            inputData += `maxlength="${Object_.MAXLENGTH}"`;
        }
        if(STR_type == "file") {
            if(Object_.ACCEPT !== undefined) {
                if(inputData != "") inputData += " ";
                inputData += `accept="${Object_.ACCEPT}"`;
            }
        }
        Arr = this.constructorNames( names , 'button' );
        
        STR_funcion = this.constructorFunction( OBJ_funcion , Arr.idElementForm );
        
        if( STR_funcion !== null ) {
            if( inputData != "" )
                inputData += " ";
            inputData += STR_funcion;
        }
        input = `<input ${STR_type == "number" ? 'min="0"' : ""} value="${Object_.DEFAULT !== undefined ? Object_.DEFAULT : ''}" ${(Object_["DISABLED"] ? "disabled='true'" : "")} ${Object_.READONLY === undefined ? '' : 'readonly'} ${inputData} name="${Arr.nameElementForm}" id="${Arr.idElementForm}" class="${STR_class} form-adm" type="${STR_type}" placeholder="${placeholder == "" ? Object_.NOMBRE : placeholder}" />`;
   
        if(STR_type == "file") {
            let valid = Object_.VALID;
            let invalid = Object_.INVALID;
            let browser = Object_.BROWSER;
            input += `<label data-invalid="${Object_.NOMBRE} ${invalid}" data-valid="${Object_.NOMBRE} ${valid}" class="custom-file-label mb-0 text-truncate" data-browse="${browser}" for="${Arr.idElementForm}"></label>`;
            if( Object_.TIPO == "TP_IMAGE" || Object_.TIPO == "TP_BLOB" ) {
                w = "auto";
                if( Object_.WIDTH !== undefined ) {
                    w = Object_.WIDTH;
                    if( w.indexOf( "px" ) > 0 ) {
                        w = w.replace( "px" , "" );
                        w = parseInt( w );
                        w *= 2;
                        w = `${w}px`;
                    }
                }
                img = `<div class="d-flex flex-wrap mx-auto" style="max-width: 100%; width: ${w}; ">`;
                    img += `<img id="src-${Arr.idElementForm}" class="w-100 mx-auto d-block img-thumbnail bg-dark" style="max-width: 50%;" src="" onError="this.src='${urlFile}'" />`;
                    img += `<img id="src-${Arr.idElementForm}-2" class="w-100 mx-auto d-block img-thumbnail bg-ligth" style="max-width: 50%;" src="" onError="this.src='${urlFile}'" />`;
                img += `</div>`
                input = `${img}<div class="custom-file">${input}</div>`;
                input += `<input type="hidden" name="${Arr.nameURLForm}" id="${Arr.idURLForm}" class="imgURL" value="" />`;
                input += `<button disabled onclick="removeImage( this )" class="btn mt-n2 btn-danger btn-block text-center btn-sm" id="${Arr.buttonElementForm}" type="button"><i class="fas fa-trash"></i></button>`;
            } else
                input = `<div class="input-group"><div class="custom-file">${input}</div><div class="input-group-append"><button style="height: calc(1.5em + 0.75rem + 2px);" disabled onclick="removeFile( this )" class="btn btn-danger btn-sm" id="${Arr.buttonElementForm}" type="button"><i class="fas fa-times-circle"></i></button></div></div><div class="input-group-text flex-column flex-wrap bg-white text-left"></div>`;
        }
        if( Object_.HELP !== undefined )
            input += `<small class="form-text text-muted">${Object_.HELP}</small>`
        if(Object_.LABEL) {
            if( STR_type == "number" )
                input = `<label for="${Arr.idElementForm}" class="form-adm">${placeholder == "" ? Object_["NOMBRE"] : placeholder}</label>${input}`;
            else
                input = `<div class="form-label-group mb-0">${input}<label for="${Arr.idElementForm}" class="form-adm">${placeholder == "" ? Object_["NOMBRE"] : placeholder}</label></div>`;
        }
        if(Object_.FIELDSET !== undefined)
            return `<fieldset><legend>${placeholder == "" ? Object_.NOMBRE : placeholder}</legend>${input}</fieldset>`;
        return input;
    };
    this.inputColor = ( OBJ_elemento , names , STR_class , OBJ_funcion = null , placeholder = "" ) => {
        let STR_funcion = "";
        let necesario = 0;
        let inputData = "";
		if(OBJ_elemento.NECESARIO !== undefined) necesario = OBJ_elemento.NECESARIO;
        if(OBJ_elemento.DISABLED === undefined) OBJ_elemento.DISABLED = 0;
        if(OBJ_elemento.LABEL === undefined) OBJ_elemento.LABEL = 0;
        
        if(STR_class != "") STR_class += " ";
        
        if(OBJ_elemento.CLASS !== undefined) {
            if(STR_class != "") STR_class += " ";
            STR_class += OBJ_elemento.CLASS;
        }
        if(necesario)
            inputData = "required='true'";
        if(OBJ_elemento.MAXLENGTH !== undefined) {
            if(inputData != "") inputData += " ";
            inputData += `maxlength="${OBJ_elemento.MAXLENGTH}"`;
        }
        
        Arr = this.constructorNames( names , 'color' );
        STR_funcion = this.constructorFunction( OBJ_funcion , Arr.colorElementForm );
        if( STR_funcion !== null ) {
            if( inputData != "" )
                inputData += " ";
            inputData += STR_funcion;
        }

        input = `<div class="input-group">`;
            input += `<input value="${OBJ_elemento.DEFAULT !== undefined ? OBJ_elemento.DEFAULT : ''}" ${(OBJ_elemento["DISABLED"] ? "disabled='true'" : "")} ${OBJ_elemento.READONLY === undefined ? '' : 'readonly'} ${inputData} name="${Arr.nameElementForm}" id="${Arr.idElementForm}" class="${STR_class}" type="color" placeholder="${placeholder == "" ? OBJ_elemento["NOMBRE"] : placeholder}" />`;
            input += `<input type="text" class="form-control text-right" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#000000" onfocus="this.select()" onchange="changeColor(this, '${Arr.idElementForm}');" id="${Arr.colorElementForm}"/>`;
        input += `</div>`;
        if( OBJ_elemento.HELP !== undefined )
            input += `<small class="form-text text-muted">${OBJ_elemento.HELP}</small>`;
        if(OBJ_elemento.LABEL)
            input = `<div class="form-label-group mb-0">${input}<label for="${Arr.idElementForm}" class="form-adm">${placeholder == "" ? Object_["NOMBRE"] : placeholder}</label></div>`;
        if(OBJ_elemento.FIELDSET !== undefined)
            return `<fieldset><legend>${placeholder == "" ? OBJ_elemento.NOMBRE : placeholder}</legend>${input}</fieldset>`;
        return input;
    };
    this.inputText = ( OBJ_elemento , names , STR_class , OBJ_funcion = null , placeholder = "" ) => {
        let STR_funcion = "";
        let necesario = 0;
        if(OBJ_elemento.NECESARIO !== undefined) necesario = OBJ_elemento.NECESARIO;
        if(OBJ_elemento.DISABLED === undefined) OBJ_elemento.DISABLED = 0;
        if(OBJ_elemento.LABEL === undefined) OBJ_elemento.LABEL = 0;
        
        STR_funcion = this.constructorFunction( OBJ_funcion );

        if(OBJ_elemento.CLASS !== undefined) {
            if(STR_class != "") STR_class += " ";
            STR_class += OBJ_elemento.CLASS;
        }
        if(OBJ_elemento.EDITOR !== undefined) {
            if(STR_class != "") STR_class += " ";
            STR_class += "ckeditor";
        }
        
        Arr = this.constructorNames( names );

        if(OBJ_elemento.MAXLENGTH !== undefined) {
            if( STR_funcion === null )
                STR_funcion = "";
            else
                STR_funcion += " ";
            STR_funcion += `maxlength="${OBJ_elemento.MAXLENGTH}"`;
        }
        
        textarea = `<textarea data-sample-short ${(necesario ? "required='true'" : "")} ${(OBJ_elemento.DISABLED ? "disabled='true'" : "")} ${STR_funcion} name="${Arr.nameElementForm}" id="${Arr.idElementForm}" class="${STR_class}" placeholder="${placeholder == "" ? OBJ_elemento.NOMBRE : placeholder}"></textarea>`;
        if(OBJ_elemento.LABEL)
            textarea = `<label for="${Arr.idElementForm}">${placeholder == "" ? OBJ_elemento.NOMBRE : placeholder}</label>${textarea}`;
        if( OBJ_elemento.HELP !== undefined )
            textarea += `<small class="form-text text-muted">${OBJ_elemento.HELP}</small>`;
        if(OBJ_elemento.FIELDSET !== undefined)
            return `<fieldset><legend>${placeholder == "" ? OBJ_elemento.NOMBRE : placeholder}</legend>${textarea}</fieldset>`;
		return textarea;
    };
    this.select = ( OBJ_elemento , names , STR_class , OBJ_funcion , OBJ_datos = null , placeholder = null ) => {
		let STR_funcion = "";
        if(OBJ_elemento.MULTIPLE === undefined) OBJ_elemento.MULTIPLE = 0;
        if(OBJ_elemento.COMUN === undefined) OBJ_elemento.COMUN = 0;
        if(OBJ_elemento.DISABLED === undefined) OBJ_elemento.DISABLED = 0;
        if(OBJ_elemento.LABEL === undefined) OBJ_elemento.LABEL = 0;
        
		STR_funcion = this.constructorFunction( OBJ_funcion );
        if(OBJ_elemento.CLASS !== undefined) {
            if(STR_class != "") STR_class += " ";
            STR_class += OBJ_elemento.CLASS;
        }
        Arr = this.constructorNames( names );
        
        let return_STR = `<select ${(OBJ_elemento["MULTIPLE"] ? "multiple='true'" : "")} ${(OBJ_elemento.DISABLED ? "disabled='true'" : "")} ${(OBJ_elemento["NECESARIO"] ? "required='true'" : "")} ${STR_funcion} name="${Arr.nameElementForm}" data-live-search="true" id="${Arr.idElementForm}" class="${STR_class} select__2" data-width="100%" data-tags="true" title="${OBJ_elemento["NOMBRE"]}">`;
        
        if(OBJ_elemento.COMUN)
            return_STR += `<option value="" hidden selected>${OBJ_elemento["NOMBRE"]}</option>`;
        if(OBJ_elemento.ENUM === undefined) {
            if( dataPYRUS !== null ) {
                if( dataPYRUS[ OBJ_elemento.NAME ] !== undefined ) {
                    for( let i in dataPYRUS[ OBJ_elemento.NAME ].DATA ) {
                        option = dataPYRUS[ OBJ_elemento.NAME ].DATA[ i ];
                        if( option === null )
                            continue;
                        if( typeof option == "object" ) {
                            if( ENTIDADES[ this.especificacion[OBJ_elemento.NAME].RELACION.E ].IDIOMAS !== undefined ) {
                                if( ENTIDADES[ this.especificacion[OBJ_elemento.NAME].RELACION.E ].IDIOMAS[ this.especificacion[OBJ_elemento.NAME].RELACION.A ] !== undefined ) {
                                    table = '';
                                    for( let t in ENTIDADES[ this.especificacion[OBJ_elemento.NAME].RELACION.E ].IDIOMAS[ this.especificacion[OBJ_elemento.NAME].RELACION.A ].ELEMENT ) {
                                        if( table != "" )
                                            table += " / ";
                                        table += `${ENTIDADES[ this.especificacion[OBJ_elemento.NAME].RELACION.E ].IDIOMAS[ this.especificacion[OBJ_elemento.NAME].RELACION.A ].ELEMENT[ t ].toUpperCase()} - ${option[ t ]}`;
                                    }

                                    option = table;
                                }
                            }
                        }
                        return_STR += `<option value="${i}">${option}</option>`;
                    }
                }
            }
        } else {
            for(let i in OBJ_elemento.ENUM)
                return_STR += `<option value="${i}">${OBJ_elemento.ENUM[i]}</option>`;
        }
        return_STR += "</select>";
        label = placeholder == "" ? OBJ_elemento.NOMBRE : placeholder;
        if( label === null)
            label = OBJ_elemento.NOMBRE;
        if(OBJ_elemento.LABEL)
            return_STR = `<label for="${Arr.idElementForm}">${OBJ_elemento["NOMBRE"]}</label>${return_STR}`;
		return return_STR;
	};
    
    /* ----------------- */
	return this.constructor();
}