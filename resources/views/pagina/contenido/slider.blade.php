<ul class="pgwSlider" id="a">


        @for($i = 0; $i <$a; $i++)
    @if ($cad[$i]['visibilidad']==1)


        <li><a href="#"><img src="{{$s[$i]}}"><span style="font-family: inherit; font-weight: bold;">{{$cad[$i]['titulo']}}</span></a>
        </li>

        @endif
       @endfor



</ul>


