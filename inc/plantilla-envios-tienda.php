<?php
$mensaje='
<div text="#000000" bgcolor="#FFFFFF"><div class="adM">
    <br>
    <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#c0c0c0" align="center">
        <tbody>
          <tr>
            <td style="padding:10px">
              <table width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center" style="border:1px solid #000000">
                <tbody>
                  <tr>
                    <td width="100%" align="center">
                      <table width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center">
                        <tbody>
                          <tr>
                            <td width="100%" valign="middle" height="5" align="center">
                              <p style="margin-top:0;margin-bottom:0"> <img width="5" height="5" src="'.$url_imgs_mail.'spacer.gif"> </p>
                            </td>
                          </tr>
                          <tr>
                            <td width="100%" valign="middle" align="center">
                              <p style="margin-top:0;margin-bottom:0">
                                <img src="'.$url_imgs_mail.'cabecera.jpg">
                              </p>
                            </td>
                          </tr>
                          <tr>
                            <td width="100%" valign="middle" align="center" style="line-height:18px">
                              <p style="margin-top:0;margin-bottom:0"> <font style="font-family:Verdana;font-size:12px;font-weight:bold;color:#aa8956"><u></u><u></u></font></p>
                              <br>
                            </td>
                          </tr>
                          <tr>
                            <td><br>
                            </td>
                          </tr>
                          <tr>
                            <td width="100%" valign="middle" height="5" align="left">
                              <p style="margin-top:0;margin-bottom:0"> <img width="5" height="5" src="'.$url_imgs_mail.'spacer.gif"></p>
                            </td>
                          </tr>
                          <tr>
                            <td width="100%" valign="middle" align="center">
                              <table width="540" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tbody>
                                  <tr>
                                    <td width="25%" valign="middle" height="10" align="left"> <br>
                                    </td>
                                    <td width="75%" valign="middle" height="10" align="left"> <br>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td valign="middle" align="center">
                              <table width="540" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tbody>
                                  <tr>
                                    <td width="100%" valign="middle" height="20" align="left">
                                      <p style="margin-top:0;margin-bottom:0"> <img width="5" height="5" src="'.$url_imgs_mail.'spacer.gif"> </p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="100%" valign="middle" align="left" style="line-height:18px">
                                      <p style="margin-top:0;margin-bottom:0"> <font style="font-size:11px;font-family:Verdana;font-weight:normal"> Hola: </font> </p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="100%" valign="middle" height="10" align="left">
                                      <p style="margin-top:0;margin-bottom:0"> <img width="5" height="5" src="'.$url_imgs_mail.'spacer.gif"> </p>
                                    </td>
                                  </tr>
                                  <tr>
                                   <td width="100%" valign="middle" align="left" style="line-height:16px">
                                      <p style="margin-top:0;margin-bottom:0"> <font style="font-size:11px;font-family:Verdana;font-weight:normal">Datos del
                                          pedido realizado por <b><a target="_blank" href="mailto:'.$email_cliente.'">'.$email_cliente.'</a></b><br>
                                          Descripcion:<br>
                                          <b>"'.$text.'"</b><br>
                                          <br>
                                          Archivos enviados:<br>
                                        </font></p>
                                      <ol>
                                        '.$archivos.'
                                      </ol>
                                      <font style="font-size:11px;font-family:Verdana;font-weight:normal"><br>
                                        Datos del cliente: <br>
                                        - Nombre cliente: <b>'.$nombre_cliente.'</b><br>
                                        - Apellidos cliente: <b>'.$ape_cliente.'</b><br>
                                        - NIF/CIF cliente: <b>'.$cif_cliente.'</b><br>
                                        - Tlfno. cliente: <b><a target="_blank" value="+34'.$tel_cliente.'" href="tel:'.$tel_cliente.'">'.$tel_cliente.'</a></b><br>
                                        - N� Presupuesto: <b>'.$presupuesto.'</b><br>
                                      </font> </td>
                                  </tr>
                                  <tr>
                                    <td width="100%" valign="middle" height="20" align="left">
                                      <p style="margin-top:0;margin-bottom:0"> <img width="5" height="5" src="'.$url_imgs_mail.'spacer.gif"> </p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="100%" valign="middle" align="left" style="line-height:16px">
                                      <p style="margin-top:0;margin-bottom:0"> <font style="font-size:11px;font-family:Verdana;font-weight:normal"> Le recordamos
                                          desde el Dpto. de Inform�tica
                                          de Mor�s que debe almacenar en
                                          un lugar seguro todos los
                                          datos de conexi�n al sistema
                                          de env�os.</font></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="100%" valign="middle" height="40" align="left">
                                      <p style="margin-top:0;margin-bottom:0"> <img width="5" height="5" src="'.$url_imgs_mail.'spacer.gif"> </p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="100%" valign="middle" align="left" style="line-height:18px">
                                      <p style="margin-top:0;margin-bottom:0"> <font style="font-size:11px;font-family:Verdana;font-weight:normal"> Reciba un
                                          cordial saludo, </font> </p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="100%" valign="middle" height="5" align="left">
                                      <p style="margin-top:0;margin-bottom:0"> <img width="5" height="5" src="'.$url_imgs_mail.'spacer.gif"> </p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="100%" valign="middle" align="left"><br>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="100%" valign="middle" height="10" align="left">
                                      <p style="margin-top:0;margin-bottom:0"> <img width="5" height="5" src="'.$url_imgs_mail.'spacer.gif"> </p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="100%" valign="middle" align="left" style="line-height:18px">
                                      <p style="margin-top:0;margin-bottom:0"> <font style="font-family:Verdana;font-size:11px;font-weight:bold;color:#858585"> Dpto. de
                                          Inform�tica de Mor�s <br>
                                          <a target="_blank" style="color:#858585;text-decoration:none" href="mailto:informatica@mores.es">
                                            informatica@mores.es </a> </font>
                                      </p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="100%" valign="middle" height="40" align="left">
                                      <p style="margin-top:0;margin-bottom:0"> <img width="5" height="5" src="'.$url_imgs_mail.'spacer.gif"> </p>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td valign="middle" align="center" style="border-top:1px solid #858585">
                              <table width="540" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tbody>
                                  <tr>
                                    <td width="100%" valign="middle" align="center" style="line-height:16px;padding:10px 0px 10px 0px">
                                      <p style="margin-top:0;margin-bottom:0"> <font style="font-family:Verdana;font-size:11px;font-weight:regular;color:#725a34"> <u></u><u></u> | Repromores S.L. -
                                              2012 <u></u><u></u><u></u> | <u></u><u></u><u></u><u></u><u></u></font>
                                      </p>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td width="100%" valign="top" align="center" style="min-height:20">
                              <p style="margin-top:0;margin-bottom:0">
                                <img src="'.$url_imgs_mail.'HIE_Template_244_i02.gif">
                              </p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
      <br>
  </div>
  ';
  ?>