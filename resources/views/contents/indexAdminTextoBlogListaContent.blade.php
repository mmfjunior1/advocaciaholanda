@extends('master.layoutAdmin')
@section('title', 'Holanda Advogados')
@section('content')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Textos do blog &nbsp;</h2> 
          <form action="/admin/textos" method="post">
          <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
          <input type="text" placeholder="Pesquise pelo título do texto" name="dado" id="dado" size="40" value="{{{$dado}}}">
          <button class="btn btn-primary" type="submit">Pesquisar</button>
          <a class="btn btn-primary" href="/admin/textos/cadastro">Incluir</a>
          </form>
          <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                  <td width="60%">Título</td>
                  <td align="center">Cadastrado em</td>
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                </tr>
              <tbody>
                <?php foreach ($search as $value){ 
                	$data		= $value->created_at;
                	echo '<tr>
	                  <td align="left">'.$value->titulo.'</td>
	                  <td align="center">'.Helpers::dateFormat($data).'</td>
          			  <td><a href="/admin/textos/show/'.$value->id.'"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
          			  <td><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></td>
	                </tr>';
                }
                ?>
              </tbody>
            </table>
          </div>
          <div class="row">{!! $search->links() !!}</div>
        </div>
      </div>
    </div>
@endsection