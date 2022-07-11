@extends('admin.admin_master')


@section('admin')
    <div    class="card-body">
        <h5 class="card-title">Editar Proceso</h5>

        <!-- Default Tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                    role="tab" aria-controls="home" aria-selected="true">Proceso Inicial</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                    role="tab" aria-controls="profile" aria-selected="false">Contestación Tribunal</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                    role="tab" aria-controls="contact" aria-selected="false">Proceso Final</button>
            </li>
        </ul>
        <div class="tab-content pt-2" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
               <!-- Floating Labels Form -->
                <form class="row g-3" method="POST" action="{{ route('proceso.update', $proceso->id) }}">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-floathing">
                            <select name="expedientes_id" class="form-select" aria-label="Default select example">
                                <option selected disabled>Selecciona Un Expediente</option>
                                @foreach ($expedientes as $expediente)
                                    <option value="{{ $expediente->id }}">{{ $expediente->numero }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->fecha_de_ingreso}}" name="fecha_de_ingreso" class="form-control" id="floatingName"
                                placeholder="Ingresar fecha_de_ingreso">
                            @error('fecha_de_ingreso')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Fecha de Ingreso</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->fecha_cedula_notificacion}}" name="fecha_cedula_notificacion" class="form-control" id="floatingName"
                                placeholder="Ingresar fecha_cedula_notificacion">
                            @error('fecha_cedula_notificacion')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Fecha Cedula Notificacion</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" value="{{$proceso->numero_de_oficio}}"  name="numero_de_oficio" class="form-control" id="floatingName"
                                placeholder="Ingresar numero_de_oficio">
                            @error('numero_de_oficio')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Numero De Oficio</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->fecha_oficio}}" name="fecha_oficio" class="form-control" id="floatingName"
                                placeholder="Ingresar fecha_oficio">
                            @error('fecha_oficio')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Fecha De Oficio</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->fecha_notificacion_admision}}" name="fecha_notificacion_admision" class="form-control" id="floatingName"
                                placeholder="Ingresar fecha_notificacion_admision">
                            @error('fecha_notificacion_admision')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Fecha Notificacion Admision</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" value="{{$proceso->quien_recibio}}" name="quien_recibio" class="form-control" id="floatingName"
                                placeholder="Ingresar quien_recibio">
                            @error('quien_recibio')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Quien Recibio</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text"  value="{{$proceso->numero_guia}}"  name="numero_guia" class="form-control" id="floatingName"
                                placeholder="Ingresar numero_guia">
                            @error('numero_guia')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Numero De Guia</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->negativa_ficha}}" name="negativa_ficha" class="form-control" id="floatingName"
                                placeholder="Ingresar negativa_ficha">
                            @error('negativa_ficha')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Negativa Ficha</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->documento_impugnado_original}}"  name="documento_impugnado_original" class="form-control" id="floatingName"
                                placeholder="Ingresar documento_impugnado_original">
                            @error('documento_impugnado_original')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Documento Impugnado Original</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->fecha_demanda}}" name="fecha_demanda" class="form-control" id="floatingName"
                                placeholder="Ingresar fecha_demanda">
                            @error('fecha_demanda')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Fecha De Demanda</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" value="{{$proceso->numero_expediente}}" name="numero_expediente" class="form-control" id="floatingName"
                                placeholder="Ingresar numero_expediente">
                            @error('numero_expediente')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Numero de expediente</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('proceso.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                    </div>
                </form><!-- End floating Labels Form -->
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

               {{-- Aqui empiza ell segundo tab --}}
                <!-- Floating Labels Form -->
                <form class="row g-3" method="POST" action="{{ route('proceso.update', $proceso->id) }}">
               <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" name="fecha_contestacion_del_tribunal" class="form-control" id="floatingName"
                        placeholder="Ingresar fecha_contestacion_del_tribunal">
                    @error('fecha_contestacion_del_tribunal')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                    <label for="nombre">Fecha Contestacion Del Tribunal</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" value="{{$proceso->contestacion}}" name="contestacion" class="form-control" id="floatingName"
                        placeholder="Ingresar contestacion">
                    @error('contestacion')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                    <label for="nombre">Contestacion</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" name="fecha_publicacion_boletin" class="form-control" id="floatingName"
                        placeholder="Ingresar fecha_publicacion_boletin">
                    @error('fecha_publicacion_boletin')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                    <label for="nombre">Fecha Publicacion Boletin</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" value="{{$proceso->fecha_de_ingreso_de_reclamo}}" name="fecha_de_ingreso_de_reclamo" class="form-control" id="floatingName"
                        placeholder="Ingresar fecha_de_ingreso_de_reclamo">
                    @error('fecha_de_ingreso_de_reclamo')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                    <label for="nombre">Fecha De Ingreso De Reclamo</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" value="{{$proceso->fecha_de_admision_o_desecho}}" name="fecha_de_admision_o_desecho" class="form-control" id="floatingName"
                        placeholder="Ingresar fecha_de_admision_o_desecho">
                    @error('fecha_de_admision_o_desecho')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                    <label for="nombre">Fecha De Admision o Deshecho</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" value="{{$proceso->fecha_correo_admision_de_demanda}}" name="fecha_correo_admision_de_demanda" class="form-control" id="floatingName"
                        placeholder="Ingresar fecha_correo_admision_de_demanda">
                    @error('fecha_correo_admision_de_demanda')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                    <label for="nombre">Fecha Correo Admision De Demanda</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" value="{{$proceso->fecha_notificacion}}" name="fecha_notificacion" class="form-control" id="floatingName"
                        placeholder="Ingresar fecha_notificacion">
                    @error('fecha_notificacion')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                    <label for="nombre">Fecha Notificacion</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" value="{{$proceso->surte_efecto}}" name="surte_efecto" class="form-control" id="floatingName"
                        placeholder="Ingresar surte_efecto">
                    @error('surte_efecto')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                    <label for="nombre">Surte Efecto</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" value="{{$proceso->boletin_oficial}}" name="boletin_oficial" class="form-control" id="floatingName"
                        placeholder="Ingresar boletin_oficial">
                    @error('boletin_oficial')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                    <label for="nombre">Boletin Oficial</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" value="{{$proceso->traslados}}" name="traslados" class="form-control" id="floatingName"
                        placeholder="Ingresar traslados">
                    @error('traslados')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                    <label for="nombre">Traslados</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" value="{{$proceso->fecha_contestacion_issste}}" name="fecha_contestacion_issste" class="form-control" id="floatingName"
                        placeholder="Ingresar fecha_contestacion_issste">
                    @error('fecha_contestacion_issste')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                    <label for="nombre">Fecha Contestacion issste</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" value="{{$proceso->contestacion_issste}}" name="contestacion_issste" class="form-control" id="floatingName"
                        placeholder="Ingresar contestacion_issste">
                    @error('contestacion_issste')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                    <label for="nombre">Contestacion issste</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" value="{{$proceso->recursos_para_seguimiento}}" name="recursos_para_seguimiento" class="form-control" id="floatingName"
                        placeholder="Ingresar recursos_para_seguimiento">
                    @error('recursos_para_seguimiento')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                    <label for="nombre">Recuersos Para Seguimiento</label>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('proceso.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
            </div>
        </form><!-- End floating Labels Form -->


                {{-- Aqui termina ell segundo tab --}}
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">


                {{-- Aqui empiza ell tercero tab --}}
                <!-- Floating Labels Form -->
                <form class="row g-3" method="POST" action="{{ route('proceso.update', $proceso->id) }}">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->fecha_admision_de_ampliacion_de_demanda}}" name="fecha_admision_de_ampliacion_de_demanda" class="form-control" id="floatingName"
                                placeholder="Ingresar fecha_admision_de_ampliacion_de_demanda">
                            @error('fecha_admision_de_ampliacion_de_demanda')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Fecha Admision De Ampliacion De Demanda</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date"  value="{{$proceso->fecha_correo_ampliacion}}" name="fecha_correo_ampliacion" class="form-control" id="floatingName"
                                placeholder="Ingresar fecha_correo_ampliacion">
                            @error('fecha_correo_ampliacion')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Fecha Correo Ampliacion</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->fecha_boletin_ampliacion}}" name="fecha_boletin_ampliacion" class="form-control" id="floatingName"
                                placeholder="Ingresar fecha_boletin_ampliacion">
                            @error('fecha_boletin_ampliacion')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Fecha Boletion Ampliacion</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date"  value="{{$proceso->fecha_correo_cierre_de_instruccion}}" name="fecha_correo_cierre_de_instruccion" class="form-control" id="floatingName"
                                placeholder="Ingresar fecha_correo_cierre_de_instruccion">
                            @error('fecha_correo_cierre_de_instruccion')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Fecha Correo Cierre De Instruccion</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->fecha_de_boletin_de_cierre_de_instruccion}}" name="fecha_de_boletin_de_cierre_de_instruccion" class="form-control" id="floatingName"
                                placeholder="Ingresar fecha_de_boletin_de_cierre_de_instruccion">
                            @error('fecha_de_boletin_de_cierre_de_instruccion')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Fecha Boletin De Cierre De Instruccion</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" value="{{$proceso->sentencia}}" name="sentencia" class="form-control" id="floatingName"
                                placeholder="Ingresar sentencia">
                            @error('sentencia')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Sentencia</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->sentencia_dictada_correo}}" name="sentencia_dictada_correo" class="form-control" id="floatingName"
                                placeholder="Ingresar sentencia_dictada_correo">
                            @error('sentencia_dictada_correo')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Sentencia Dictada Correo</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->sentencia_dicatada_boletin}}" name="sentencia_dicatada_boletin" class="form-control" id="floatingName"
                                placeholder="Ingresar sentencia_dicatada_boletin">
                            @error('sentencia_dicatada_boletin')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Sentencia Dictada Boletin</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date"  value="{{$proceso->fecha_amparo}}" name="fecha_amparo" class="form-control" id="floatingName"
                                placeholder="Ingresar fecha_amparo">
                            @error('fecha_amparo')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Fecha Amparo</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" value="{{$proceso->numero_amparo}}" name="numero_amparo" class="form-control" id="floatingName"
                                placeholder="Ingresar numero_amparo">
                            @error('numero_amparo')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Numero Amparo</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" value="{{$proceso->sala}}" name="sala" class="form-control" id="floatingName"
                                placeholder="Ingresar sala">
                            @error('sala')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Sala</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" value="{{$proceso->toca}}" name="toca" class="form-control" id="floatingName"
                                placeholder="Ingresar toca">
                            @error('toca')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Toca</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text"  value="{{$proceso->otro}}" name="otro" class="form-control" id="floatingName"
                                placeholder="Ingresar otro">
                            @error('otro')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Otro</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->fecha_admision_amparo}}" name="fecha_admision_amparo" class="form-control" id="floatingName"
                                placeholder="Ingresar fecha_admision_amparo">
                            @error('fecha_admision_amparo')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Fecha Admision Amparo</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->boletin_admision_amparo}}" name="boletin_admision_amparo" class="form-control" id="floatingName"
                                placeholder="Ingresar boletin_admision_amparo">
                            @error('boletin_admision_amparo')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Boletin Admision Amparo</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->fecha_correo_resolucion}}" name="fecha_correo_resolucion" class="form-control" id="floatingName"
                                placeholder="Ingresar fecha_correo_resolucion">
                            @error('fecha_correo_resolucion')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Fecha Correo Resolucion</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->fecha_boletin_resolucion}}" name="fecha_boletin_resolucion" class="form-control" id="floatingName"
                                placeholder="Ingresar fecha_boletin_resolucion">
                            @error('fecha_boletin_resolucion')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Fecha Boletin Resolucion</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" value="{{$proceso->resolucion_amparo}}" name="resolucion_amparo" class="form-control" id="floatingName"
                                placeholder="Ingresar resolucion_amparo">
                            @error('resolucion_amparo')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Resolucion Amparo</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->resolucion_de_amparo_positiva}}" name="resolucion_de_amparo_positiva" class="form-control" id="floatingName"
                                placeholder="Ingresar resolucion_de_amparo_positiva">
                            @error('resolucion_de_amparo_positiva')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Resolucion De Amparo Positiva</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->decimo_transitorio}}" name="decimo_transitorio" class="form-control" id="floatingName"
                                placeholder="Ingresar decimo_transitorio">
                            @error('decimo_transitorio')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Decimo Transitorio</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->recurso_de_revision}}" name="recurso_de_revision" class="form-control" id="floatingName"
                                placeholder="Ingresar recurso_de_revision">
                            @error('recurso_de_revision')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Recurso De Revision</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->recurso_de_queja}}" name="recurso_de_queja" class="form-control" id="floatingName"
                                placeholder="Ingresar recurso_de_queja">
                            @error('recurso_de_queja')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Recurso De Queja</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" value="{{$proceso->notificacion_recurso_de_queja}}" name="notificacion_recurso_de_queja" class="form-control" id="floatingName"
                                placeholder="Ingresar notificacion_recurso_de_queja">
                            @error('notificacion_recurso_de_queja')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="nombre">Notificacion Recurso De Queja</label>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('proceso.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                    </div>
                </form><!-- End floating Labels Form -->


                 {{-- Aqui termina ell tercero tab --}}
            </div>
        </div><!-- End Default Tabs -->

    </div>
@endsection
