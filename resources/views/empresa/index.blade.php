@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="d-flex justify-content-between align-self-center mt-5 mb-4">
                <h4>Empresas</h4>
                </div>
                <div class="text-right col-md-2">
                    <a href="{{Route('empresa.create')}}" >
                      <br> <input type="submit" value="Crear empresa" class="button">
                    </a>
                </div>

                <table>
                   
                    <tbody>
                        <div>
                            @foreach($empresas as $empresa)
                            <tr class="card-list1">
                            
                            <td>

                                <div class="card_header">
                                     <h3><a href="{{Route('empresa.show', $empresa->id)}}" class="selector">{{$empresa->name}}</a></h3>

                                    <div class="float">
                                            <form action="{{Route('empresa.destroy', $empresa->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <i class="fa fa-trash icons button_hidden"></i>

                                                <a  class="float1" href="{{Route('empresa.edit', $empresa->id)}}">
                                                    <i class="fa fa-edit icons"></i>
                                                </a>
                                                
                                            </form>
                                    </div>

                                </div>

                                    <hr>

                                    <div class="description">
                                        <p> {{$empresa->description}}</p>
                                    </div>
                            </td>

                        </tr>
                            @endforeach
                    </div>
                    </tbody>
                </table>
            </div>
    </div>
</div>
@endsection
