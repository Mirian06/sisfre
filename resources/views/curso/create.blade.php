@extends('layout.base')

@section('titulo','Cadastrar Curso')

@section('conteudo')
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">Cadastrar Curso</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{route('curso.store')}}">
                           
                           <div class="row col-md-12">
                                <div class="form-group col-md-8 {{ $errors->has('nome') ? ' has-error' : '' }}">
                                    <label class="col-md-3 control-label" for="ano">Nome:</label>
                                    <div class="col-md-8">
                                        <input id="nome" name="nome" maxlength="160" value="{{ old('nome'), '' }}" class="form-control input-md text-uppercase" type="text">

                                        @if ($errors->has('nome'))
                                            <span class="help-block">
                                                 <strong>{{ $errors->first('nome') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group col-md-4 {{ $errors->has('sigla') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label" for="sigla">Sigla:</label>
                                    <div class="col-md-8">
                                        <input id="sigla" name="sigla" maxlength="10" value="{{ old('sigla'), '' }}" class="form-control input-md text-uppercase" type="text">


                                        @if ($errors->has('sigla'))
                                            <span class="help-block text-center">
                                                 <strong>{{ $errors->first('sigla') }}</strong>
                                            </span>
                                        @endif

                                    </div>

                                </div>
                            </div>

                            <div class="row col-md-12">

                                <div class="form-group col-md-8 {{ $errors->has('tipo') ? ' has-error' : '' }}">
                                    <label for="tipo" class="col-md-3 control-label">Tipo: </label>

                                    <div class="col-md-8">
                                        <select class="selectpicker form-control" name="tipo" id="tipo">
                                            @if(old('tipo')=="1")
                                                <option data-tokens="ketchup mustard" value="{{old('tipo')}}" selected> GRADUAÇÃO </option>
                                            @elseif(old('tipo')=="2")
                                                <option data-tokens="ketchup mustard" value="{{old('tipo')}}" selected> INTEGRADO </option>
                                            @elseif(old('tipo')=="3")
                                                <option data-tokens="ketchup mustard" value="{{old('tipo')}}" selected> TÉCNICO </option>
                                            @else
                                                <option data-tokens="ketchup mustard" value="" selected> SELECIONE..</option>
                                            @endif
                                            <option data-tokens="ketchup mustard" value="1" > GRADUAÇÃO </option>
                                            <option data-tokens="ketchup mustard" value="2" > INTEGRADO </option>
                                            <option data-tokens="ketchup mustard" value="3" > TÉCNICO </option>
                                        </select>

                                        @if ($errors->has('tipo'))
                                            <span class="help-block">
                                                 <strong>{{ $errors->first('tipo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-4 {{ $errors->has('duracao') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label" for="duracao">Duração:</label>
                                    <div class="col-md-8">
                                        <input id="duracao" name="duracao" maxlength="10" value="{{ old('duracao'), '' }}" class="form-control input-md" type="text">


                                        @if ($errors->has('duracao'))
                                            <span class="help-block text-center">
                                                 <strong>{{ $errors->first('duracao') }}</strong>
                                            </span>
                                        @endif

                                    </div>

                                </div>

                                <div class="form-group col-md-8 {{ $errors->has('coord') ? ' has-error' : '' }}">
                                    <label for="coord" class="col-md-3 control-label">Coordenador: </label>

                                    <div class="col-md-8">
                                        <select class="selectpicker form-control text-uppercase" name="coord" id="coord">
                                            <option data-tokens="ketchup mustard" value="" selected> SELECIONE..</option>
                                            @foreach($professores as $prof)
                                                @if(old('coord') == $prof->id)
                                                    <option data-tokens="ketchup mustard" value="{{$prof->id}}" selected> {{ $prof->usuario->username }} </option>
                                                @endif
                                                <option data-tokens="ketchup mustard" value="{{$prof->id}}">{{ $prof->usuario->username }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('coord'))
                                            <span class="help-block">
                                                 <strong>{{ $errors->first('coord') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12" ></div>
                            <div class="form-group col-md-12" ></div>

                            <div class="row col-md-7 col-md-offset-3">
                                <div class="form-group col-md-5">
                                        <button type="submit" class="btn btn-block btn-lg btn-success">
                                            Cadastrar
                                        </button>     
                                </div>

                                <div class="form-group col-md-2" ></div>

                                <div class="form-group col-md-5">
                                    <a href="{{route('home')}}" class="btn btn-block btn-lg btn-danger">
                                        Cancelar
                                    </a>   
                                </div>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </div>
                </div>
            </div>
@endsection