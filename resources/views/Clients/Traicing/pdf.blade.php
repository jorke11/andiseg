<html>
    <head>
        <title>Document</title>
    </head>
    <body>
        @include('Clients.Traicing.pdfheader')
        <br>
        <br>
        <table style="width:100%;">
            <tr>
                <td align="center" style="font-weight: bold">COMPAÑÍA ANDINA DE SEGURIDAD PRIVADA </td>

            </tr>
            <tr>
                <td align="center" style="font-weight: bold">DEPARTAMENTO DE INVESTIGACIÓN, CONSULTORÍA Y ASESORÍA</td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        <table style="width:100%;">
            <tr>
                <td align="center" style="font-weight: bold">ÁREA DE ESTUDIOS TÉCNICOS DE SEGURIDAD</td>

            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        <table style="width:100%;">
            <tr>
                <td align="center" style="font-weight: bold;font-size: 12px">TIPO II</td>

            </tr>
        </table>
        <br>
        <br>
        <table style="width:100%;">
            <tr>
                <td align="center" style="font-weight: bold;font-size: 14px">Contrato</td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <table style="width:100%;">
            <tr>
                <td align="center" style="font-weight: bold;font-size: 14px">Logo</td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        <table style="width:100%;">
            <tr>
                <td align="center" style="font-weight: bold;font-size: 14px">Bogota D.C. </td>
            </tr>
        </table>

        <br>
        <br>
        <br>

        @include('Clients.Traicing.pdffooter')
        <br>
        @include('Clients.Traicing.pdfheader')
        <br>
        <br>
        <br>
        <table  style="width:100%;border: 1px solid black;border-collapse: collapse;" align="center">
            <tr >
                <td align="center" style="background-color: #95b3d7;color:black;font-weight: bold" >{{$name}} {{$last_name}}</td>
            </tr>
        </table>
        <table style="width:100%;" align="center">
            <tr>
                <td>
                    <table style="width:80%;" align="center">
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px">Entidad Solicitante</td>
                        </tr>
                        <tr>
                            <td>{{$client}}</td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px">Cargo a desempeñar</td>
                        </tr>
                        <tr>
                            <td>{{$position}}</td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table style="width:80%;" align="center">
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td>
                                <table style="width:100%;" border="1">
                                    <tr>
                                        <td><br><br><br></td>
                                    </tr>
                                </table></td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <table style="width:100%;border: 1px solid black;border-collapse: collapse;" align="center">
            <tr >
                <td align="center" style="background-color: #95b3d7;color:black;font-weight: bold" >Componente Biografico</td>
            </tr>
        </table>
        <style>
            .componente tr td {
                border: 1px solid black;
            }
            .row-color{
                color:#084B8A;
            }
        </style>
        <table style="width:100%;border-collapse: collapse;" align="center" class="componente">
            <tr>
                <td colspan="5" class="row-color">Apellidos</td>
                <td colspan="4" class="row-color">Nombres</td>
                <td  class="row-color">Seudonimos</td>
            </tr>
            <tr>
                <td colspan="5">{{$last_name}}</td>
                <td colspan="4">{{$name}}</td>
                <td>No tiene</td>
            </tr>
            <tr>
                <td colspan="2" class="row-color">Documento</td>
                <td colspan="2" class="row-color">Numero</td>
                <td class="row-color">Lugar de Expedición</td>
                <td colspan="2" class="row-color">Pasaporte</td>
                <td class="row-color">Librera Militar</td>
                <td class="row-color">Clase</td>
                <td class="row-color">Distrito</td>
            </tr>
            <tr>
                <td colspan="2">{{$type_document}}</td>
                <td colspan="2">{{$document}}</td>
                <td>{{$city_expedition}}</td>
                <td colspan="2">{{$passport}}</td>
                <td>{{$militar_card}}</td>
                <td>{{$class_militar}}</td>
                <td>{{$district}}</td>
            </tr>
            <tr>
                <td colspan="4" class="row-color">Lugar de Nacimiento</td>
                <td class="row-color">Dia</td>
                <td class="row-color">Mes</td>
                <td class="row-color">Año</td>
                <td class="row-color">Edad</td>
                <td class="row-color">Estado Civil</td>
                <td class="row-color">Profesion u Ocupación</td>
            </tr>
            <tr>
                <td colspan="4">{{$city_birthday}}</td>
                <td>dia</td>
                <td>mes</td>
                <td>año</td>
                <td>{{$age}}</td>
                <td>{{$civil_status}}</td>
                <td>{{$profession}}</td>
            </tr>
            <tr>
                <td colspan="4" class="row-color">Tarjeta Profesional</td>
                <td colspan="3" class="row-color">Direccion de residencia</td>
                <td colspan="2" class="row-color">Barrio</td>
                <td colspan="2" class="row-color">Ciudad</td>
            </tr>
            <tr>
                <td colspan="4">{{$professional_card}}</td>
                <td colspan="3">{{$address}}</td>
                <td colspan="2">{{$neighborhood}}</td>
                <td colspan="2">{{$city}}</td>
            </tr>

            <tr>
                <td colspan="4" class="row-color">Telefono Fijo(1)</td>
                <td colspan="2" class="row-color">Telefono Fijo(2)</td>
                <td colspan="2" class="row-color">Celular</td>
                <td colspan="3" class="row-color">Correo Electronico</td>
            </tr>
            <tr>
                <td colspan="4">{{$phone}}</td>
                <td colspan="2">{{$phone2}}</td>
                <td colspan="2">{{$mobil}}</td>
                <td colspan="3">{{$email}}</td>
            </tr>
            <tr>
                <td colspan="4" class="row-color">Licencia de Conducción</td>
                <td colspan="2" class="row-color">Categoria</td>
                <td colspan="3" class="row-color">EPS</td>
                <td colspan="2" class="row-color">Fondo de pensiones</td>
            </tr>
            <tr>
                <td colspan="4">{{$driving_licence}}</td>
                <td colspan="2">{{$category}}</td>
                <td colspan="3">{{$eps}}</td>
                <td colspan="2">{{$pension}}</td>
            </tr>
        </table>

        @include('Clients.Traicing.pdffooter')
        <br>
        @include('Clients.Traicing.pdfheader')
        <br>
        <table style="width:100%;border-collapse: collapse;" align="center" class="componente" align="center">
            <tr >
                <td align="center" style="background-color: #95b3d7;color:black;font-weight: bold" >Validacion Academica</td>
            </tr>
        </table>
        <br>
        <table style="width:100%;border-collapse: collapse;" align="center" class="componente">
            <tr>
                <td class="row-color">Tipo</td>
                <td class="row-color">Titulo Obtenido</td>
                <td class="row-color">Nombre Institucion</td>
                <td class="row-color">Concepto</td>
            </tr>
            <?php
            foreach ($academic as $val) {
                ?>
                <tr>
                    <td><?php echo $val->type_study ?></td>
                    <td><?php echo $val->obtained_title ?></td>
                    <td><?php echo $val->institution ?></td>
                    <td><?php echo $val->concept ?></td>
                </tr>
                <?php
            }
            ?>

        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <table style="width:100%;border-collapse: collapse;" align="center">
            <tr >
                <td align="center" style="background-color: #95b3d7;color:black;font-weight: bold" >Informacion Judicial</td>
            </tr>
        </table>
        <br>
        <table style="width:100%;border-collapse: collapse;" align="center" class="componente">
            <tr>
                <td></td>
                <td class="row-color">Si/NO</td>
                <td class="row-color">Descripcion</td>
            </tr>
            <?php
            foreach ($juridic as $val) {
                ?>
                <tr>
                    <td><?php echo $val->question ?></td>
                    <td><?php echo $val->si_no ?></td>
                    <td><?php echo $val->description ?></td>

                </tr>
                <?php
            }
            ?>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        @include('Clients.Traicing.pdffooter')
        <br>
        @include('Clients.Traicing.pdfheader')
        <br>
        <table style="width:100%;border-collapse: collapse;" align="center">
            <tr >
                <td align="center" style="background-color: #95b3d7;color:black;font-weight: bold" >Registros y Anotaciones</td>
            </tr>
        </table>
        <br>
        <br>

        <table style="width:100%;border-collapse: collapse;" border="1" align="center">
            <tr>
                <td class="row-color">Entidad</td>
                <td class="row-color">Codigo Verificacion</td>
                <td class="row-color">Certificado</td>
                <td class="row-color">Anotación</td>
            </tr>
            <?php
            foreach ($anotations as $value) {
                ?>
                <tr>
                    <td><?php echo $value->entity ?></td>
                    <td><?php echo $value->verification_code ?></td>
                    <td><?php echo $value->certificate ?></td>
                    <td><?php echo $value->anotation ?></td>
                </tr>
                <?php
            }
            ?>

        </table>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        @include('Clients.Traicing.pdffooter')
        <br>
        @include('Clients.Traicing.pdfheader')
        <br>
        <table style="width:100%;border-collapse: collapse;" align="center">
            <tr>
                <td align="center" style="background-color: #95b3d7;color:black;font-weight: bold" >Experiencia Laboral</td>
            </tr>

        </table>
        <br>
        <br>
        <?php
//            print_r($laboral);exit;
        foreach ($laboral as $val) {
            ?>
            <table style="width:100%;border-collapse: collapse;" align="center" class="componente">
                <tr>
                    <td colspan="2" class="row-color">Empresa</td>
                    <td class="row-color">Actividad</td>
                    <td class="row-color">Telefono</td>
                </tr>
                <tr>
                    <td colspan="2">{{$val->business}}</td>
                    <td>{{$val->activity}}</td>
                    <td>{{$val->phone}}</td>
                </tr>
                <tr>
                    <td class="row-color">Cargo desempeñado</td>
                    <td class="row-color">Fecha Ingreso</td>
                    <td class="row-color">Fecha Retiro</td>
                    <td class="row-color">Nombre Persona Contactada</td> 
                </tr>
                <tr>
                    <td>{{$val->position}}</td>
                    <td>{{date("Y-m-d",strtotime($val->fentry))}}</td>
                    <td>{{date("Y-m-d",strtotime($val->fdeparture))}}</td>
                    <td>{{$val->contact}}</td>
                </tr>
                <tr>
                    <td class="row-color">Concepto Emitido</td>
                    <td colspan="3">{{$val->concept}}</td>
                </tr>
                <tr>
                    <td class="row-color">Resultado</td>
                    <td colspan="3">{{$val->result}}</td>
                </tr>
            </table>
            <?php
        }
        ?>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        @include('Clients.Traicing.pdffooter')
        <br>
        @include('Clients.Traicing.pdfheader')
        <br>
        <table style="width:100%;border-collapse: collapse;" align="center">
            <tr >
                <td align="center" style="background-color: #95b3d7;color:black;font-weight: bold" >Album Fotografico</td>
            </tr>
        </table>
        <table style="width:100%;border-collapse: collapse;" align="center" class="componente">
            <tr>
                <?php
                foreach ($anotations as $value) {
                    ?>
                    <td><img src='<?php echo $value->img ?>' width="300px"></td>
                    <?php
                }
                ?>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        @include('Clients.Traicing.pdffooter')
        <br>
        @include('Clients.Traicing.pdfheader')
        <br>
        <table style="width:100%;border-collapse: collapse;" align="center">
            <tr >
                <td align="center" style="background-color: #95b3d7;color:black;font-weight: bold" >Soportes</td>
            </tr>
        </table>
        <br>
        <table class="componente">
            <tr>
                <?php
                foreach ($photo as $value) {
                    ?>
                    <td><b><?php echo $value->typephoto ?></b><br><img src='<?php echo $value->thumbnail ?>'></td>
                    <?php
                }
                ?>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        @include('Clients.Traicing.pdffooter')
        <br>
        @include('Clients.Traicing.pdfheader')
        <br>
        <table style="width:100%;border-collapse: collapse;" align="center">
            <tr >
                <td align="center" style="background-color: #95b3d7;color:black;font-weight: bold" >Concepto Final del estudio</td>
            </tr>
        </table>
        <br>

        <table style="width:100%;border-collapse: collapse;" align="center"  class="componente">
            <tr>
                <td>{{$comment}}</td>
            </tr>
        </table>
    </body>
</html>
