<div style="background-color: #b43432;">
        <div class="container content-prin profile">

            <div class="row margin-bottom-10 margin-top-10">
                <div class="headline-center-v2 margin-bottom-10">
                    <h1 style="font-size: 30px; color:#fff;"><b>Todas las Novedades</b></h1>
                    <span class="bordered-icon"><i class="fa fa-files-o" aria-hidden="true"></i></span>
                </div>


                @for($i = $n-1; $i >=0; $i--)
                @if ($t<3)


                <div class="col-sm-4">

                         <div class="service-block-v1 md-margin-bottom-50" style="background: #fff; border-top: 5px solid #f1c40f;">
                                                        <i class="icon-custom icon-lg rounded-x icon-color-yellow icon-line fa fa-link" style="background: #fff;"></i>

    <h5 class="title-v3-bg text-uppercase"><a href="novedad/{{$novedad[$i]['id']}}" style="text-transform:none; color:#464646;">
                    <b>{{$novedad[$i]['created_at']}}</b></a>
                            </h5>
                            <p>
                                    {{$novedad[$i]['titulo']}}            </p>
                            <a href="novedad/{{$novedad[$i]['id']}}"><b>Leer
                                    más</b></a>
                        </div>
                    </div>
                    @endif
                    <?php $t++ ?>
       @endfor

                    </div>
                            <div class="col-md-12 margin-top-10">
                    <a href="novedadesTodas" class="btn-u btn-brd btn-brd-hover btn-u-light btn-u-sm pull-right tooltips" data-toggle="tooltip" data-placement="left" data-original-title="Más Novedades Anteriores">Ver
                        más <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>

                </div>
            </div><!--/row-->

        </div>
    </div>
