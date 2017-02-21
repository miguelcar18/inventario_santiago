<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content="Ulses">
        <meta name="description" content="OGM">
        <meta name="keywords" content="Academia de Negocios Online">
        @section('titulo')
        <title>OGM Academia de Negocios Online</title>
        @show
        <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet" />
    </head>
    <body link="#FFFF00" alink="#FFFF00" vlink="#FFFF00" bgcolor="#660000"text="#FFFFFF" onload="MM_preloadImages('{{ asset('front/imagenes_ogm/botones_con_destello/inicio_2.jpg') }}','{{ asset('front/imagenes_ogm/botones_con_destello/productos_2.jpg') }}','{{ asset('front/imagenes_ogm/botones_con_destello/nosotros_2.jpg') }}','{{ asset('front/imagenes_ogm/botones_con_destello/Contactenos_2.jpg') }}')">
        <table width="646" border="3" align="center" background="{{ asset('front/imagenes_ogm/fondo negro para la web.jpg') }}">
            <tr>
                <td width="632">
                    <img src="{{ asset('front/imagenes_ogm/filosofiafactor alfa .jpg') }}" width="650" height="200" />
                </td>
            </tr>
            <tr>
                <td height="53">
                    <table width="632" border="3">
                        <tr>
                            <td width="150">
                                <img src="{{ asset('front/imagenes_ogm/botones_con_destello/inicio_1.jpg') }}" alt="inicio" name="Image1" width="150" height="45" id="Image1" longdesc="inicio" onclick="MM_goToURL('parent','{{ URL::route('principal') }}');return document.MM_returnValue" onmouseover="MM_swapImage('Image1','','{{ asset('front/imagenes_ogm/botones_con_destello/inicio_2.jpg') }} ',1)" onmouseout="MM_swapImgRestore()" />
                            </td>
                            <td width="150">
                                <a href="{{ URL::route('nosotros') }}">
                                    <img src="{{ asset('front/imagenes_ogm/botones_con_destello/nosotros.jpg') }}" name="Image2" width="150" height="45" border="0" id="Image2" onclick="MM_goToURL('parent','{{ URL::route('nosotros') }}');return document.MM_returnValue" onmouseover="MM_swapImage('Image2','','{{ asset('front/imagenes_ogm/botones_con_destello/nosotros_2.jpg') }}',1)" onmouseout="MM_swapImgRestore()" />
                                </a>
                            </td>
                            <td width="150">
                                <img src="{{ asset('front/imagenes_ogm/botones_con_destello/productos_1.jpg') }}" name="Image3" width="150" height="45" id="Image3" onclick="MM_goToURL('parent','paginas_ogm/productos_f.html');return document.MM_returnValue" onmouseover="MM_swapImage('Image3','','{{ asset('front/imagenes_ogm/botones_con_destello/productos_2.jpg') }}',1)" onmouseout="MM_swapImgRestore()" />
                            </td>
                            <td width="150">
                                <img src="{{ asset('front/imagenes_ogm/botones_con_destello/Contactenos.jpg') }}" name="Image4" width="150" height="45" id="Image4" onclick="MM_goToURL('parent','paginas_ogm/contacto+f.html');return document.MM_returnValue" onmouseover="MM_swapImage('Image4','','{{ asset('front/imagenes_ogm/botones_con_destello/Contactenos_2.jpg') }}',1)" onmouseout="MM_swapImgRestore()" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="980">
                    @section('contenido')
                    <table width="614" height="724" border="3" align="center">
                        <tr>
                            <td height="147">
                                <p align="center" class="Estilo21">
                                    <img src="{{ asset('front/imagenes_ogm/Letras rojas desnfoque radial.jpg') }}" width="600" height="200" />
                                    <br /><br />
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td height="412">
                                <table width="570" height="464" border="3">
                                    <tr>
                                        <td width="300" height="200">
                                            <img src="{{ asset('front/imagenes_ogm/Ulisillas doblada con arequipe.jpg') }}" alt="ulisilla" width="300" height="200" longdesc="ulisilla con arequipe" />
                                        </td>
                                        <td width="250">
                                            <p align="justify" class="Estilo11">
                                                <img src="{{ asset('front/imagenes_ogm/GM VendiendoUli Wis.jpg') }}" alt="Uli Wis" width="250" height="200" />
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="254">
                                            <img src="{{ asset('front/imagenes_ogm/Minillards Con Arequipe con fondo.jpg') }}" alt="Minillards" width="300" height="250" longdesc="Minillards con Arequipe" />
                                        </td>
                                        <td>
                                            <p align="right"><img src="{{ asset('front/imagenes_ogm/GM Vendiendo un Minillard.jpg') }}" alt="Minillards" width="250" height="250" /></p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    @show
                </td>
            </tr>
        </table>
        <div class="Estilo19" id="Layer1">
            <div align="right" class="Estilo20">
                <a href="{{ URL::route('login.index') }}">Login</a>
            </div>
        </div>
        <script type="text/javascript">
            function MM_preloadImages() {
                var d = document;
                if(d.images){
                    if(!d.MM_p) 
                        d.MM_p = new Array();
                    var i, j = d.MM_p.length, a = MM_preloadImages.arguments;
                    for(i = 0; i < a.length; i++)
                        if (a[i].indexOf("#") != 0){
                            d.MM_p[j] = new Image;
                            d.MM_p[j++].src = a[i];
                        }
                }
            }

            function MM_swapImgRestore() {
                var i, x, a = document.MM_sr;
                for(i = 0; a&&i < a.length&&(x = a[i])&&x.oSrc; i++)
                    x.src = x.oSrc;
            }

            function MM_findObj(n, d) {
                var p, i, x;
                if(!d) 
                    d = document;
                if((p = n.indexOf("?")) > 0&&parent.frames.length){
                    d = parent.frames[n.substring(p+1)].document;
                    n = n.substring(0,p);
                }
                if(!(x = d[n])&&d.all) x = d.all[n];
                    for (i = 0; !x&&i < d.forms.length; i++)
                        x = d.forms[i][n];
                for(i = 0; !x&&d.layers&&i < d.layers.length; i++)
                    x = MM_findObj(n,d.layers[i].document);
                if(!x && d.getElementById)
                    x = d.getElementById(n);
                return x;
            }

            function MM_swapImage() {
                var i, j = 0, x, a = MM_swapImage.arguments;
                document.MM_sr = new Array; 
                for(i = 0; i < (a.length - 2); i += 3)
                    if ((x = MM_findObj(a[i])) != null)
                    {
                        document.MM_sr[j++] = x;
                        if(!x.oSrc)
                            x.oSrc = x.src;
                        x.src = a[i+2];
                    }
            }
            function MM_goToURL() {
                var i, args = MM_goToURL.arguments;
                document.MM_returnValue = false;
                for (i = 0; i < (args.length - 1); i += 2)
                    eval(args[i] + ".location='" + args[i+1] + "'");
            }
        </script>
    </body>
</html>