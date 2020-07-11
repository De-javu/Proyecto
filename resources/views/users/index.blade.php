<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


       
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
            <div class="row">
                <div class="col-sm-8 mx-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                           @if($errors->any())
                           <div class="alert alert-danger">
                               @foreach($errors->all() as $error)
                               - {{ $error }} <br>
                               @endforeach

                           </div>
                           @endif
                        <form action="{{ route('users.store') }}"method="POST">
                        <div class="form-row">
                            <div class="col-sm-3">
                               <input type="text"name="name"class="form-control"placeholder="Nombre" value="{{ old( 'name' )}}">
                            </div>
                            <div class="col-sm-4">
                               <input type="text"name="email"class="form-control"placeholder="Email" value="{{ old( 'email' )}}">>
                            </div>
                            <div class="col-sm-3">
                               <input type="password"name="password"class="form-control"placeholder="Contraseña" value="{{ old( 'password' )}}">>
                            </div>
                            <div class="col-auto">
                                @csrf
                               <button type="submint" class="btn btn-primary">Crear</button>
                            </div>
                            
                        </div>
                        </form>
                        </div>
                    </div>


                <table class="tabla">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Email</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($users as $user)
                      <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>

                        
                              <form action="{{ route('users.destroy', $user) }}"method="POST">
                             @method('DELETE') 
                             @csrf 
                             <input
                                    type="submit" 
                                    value="Eliminar"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Desea eliminar...?')" >  
                             </form>
                                </td>
                     </tr>
                     @endforeach 
                  </tbody>
                </table>

                </div>

            </div>

        </div>
    </body>
</html>
