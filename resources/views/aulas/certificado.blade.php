<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
<div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
       <span style="font-size:50px; font-weight:bold">Certificado</span>
       <br><br>
       <span style="font-size:25px"><i>Certificamos que </i></span>
       <br><br>
       <span style="font-size:30px"><b>{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->name }}}</b></span><br/><br/>
       <span style="font-size:25px"><i>completou o curso de </i></span> <br/><br/>
       <span style="font-size:30px">{{$cursos->nome}}</span> <br/><br/>
       <span style="font-size:25px"><i>com a carga horária de 20 horas. </i></span> <br/><br/>
        <br/><br/><br/><br/>
       <span style="font-size:25px"><i>Itatiba, São Paulo</i></span><br>
      {{ date('d/m/y') }}
      <br>
      <img src="{{ asset('plugins/images/logo.png') }}" />
</div>
</div>