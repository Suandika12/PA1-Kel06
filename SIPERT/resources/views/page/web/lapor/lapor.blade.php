<x-web-layout title="Home">
  <style>
    .form-control{
      height:none;
    }
  </style>
    <div class="hero">
        <section class="home-slider owl-carousel">
          <div class="slider-item" style="background-image: url({{ asset('image/slide4.jpeg') }}); background-size: cover; background-position: center center; width: 100%; height: 100%">
            <div class="overlay"></div> 
            <div class="container">
              <div class="row no-gutters slider-text align-items-center justify-content-end">
                <div class="col-md-6 ftco-animate">
                  <div class="text px-4">
                    </h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
          <div class="slider-item" style="background-image: url({{ asset('image/slide2.jpeg') }})); background-size: cover; background-position: center center; width: 100%; height: 100%">
            <div class="overlay"></div>
            <div class="container">
              <div class="row no-gutters slider-text align-items-center justify-content-end">
                <div class="col-md-6 ftco-animate">
                  <div class="text px-4">
                  </div>
                </div>
              </div>
            </div>
          </div>
    
          <div class="slider-item" style="background-image: url({{ asset('image/slide3.jpeg') }}); background-size: cover; background-position: center center; width: 100%; height: 100%">
            <div class="overlay"></div>
            <div class="container">
              <div class="row no-gutters slider-text align-items-center justify-content-end">
                <div class="col-md-6 ftco-animate">
                  <div class="text px-4">
                    <br><br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    
      <br>
      <br>

      <div class="wrap">
        <div class="container">
            @if(session()->has('success'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center; color:rgb(255, 8, 8)">
              {{ session('success') }}
            </div>
        @endif

        <div class="wrap">
          <div class="container">
              @if(session()->has('delete'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center; color:rgb(255, 8, 8)">
                {{ session('delete') }}
              </div>
          @endif
          
        <div class="wrap">
          <div class="container">
              @if(session()->has('delete'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center; color:rgb(255, 8, 8)">
                {{ session('delete') }}
              </div>
          @endif

<div class="container">
    <div class="row">
          <div class="card">
            @if(!Auth::check())
            <div class="card-header">Formulir Lapor Pertamanan</div>
            <div class="card-body">
                
                <form action="{{ route ('lapor.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <label>Judul Laporan</label></br>
                  <div class="input-group mb-3">
                  <input type="text" name="judul" id="judul" class="form-control @error('judul') is invalid @enderror">
                </div>
                  @error('judul')
                  <div class="alert alert-danger">{{ 'The title field is required'}}</div>
                  @enderror
                </br>
                  <label>Isi Keluhan</label></br>
                  <div class="input-group mb-3">
                  <input type="text" name="Isi_Keluhan" id="Isi_Keluhan" class="form-control  @error('Isi_Keluhan') is invalid @enderror">
                </div>
                  @error('Isi_Keluhan')
                  <div class="alert alert-danger">{{ 'The complaint field is required'}}</div>
                  @enderror
                </br>
                  <label>Gambar</label></br>
                  <div class="input-group mb-3">
                  <input type="file" name="Choose_File" accept=".png,.jpg,.jpeg,.gif" id="Choose_File"  @error('Choose_File') is invalid @enderror"  style="height: auto">
                </div>
                  @error('Choose_File')
                  <div class="alert alert-danger">{{ 'The choose picture field is required' }}</div>
                  @enderror
                  <br>
              

                  <input type="submit" value="Kirim" class="btn btn-success"></br>
              </form>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
             
</div>
</div>
</div>
</div>
</div>
</div>
</div>
      
          <br>
          
          @elseif(Auth::user()->role == 'admin')
            <div class="card">
                <div class="card-header">Laporan Keluhan Dari User</div>
                <div class="card-body">
                  <div style="text-align: right">
                    @if(Auth::user()->role == 'admin')
                      <button class="btn btn-sm btn-danger delete_all" data-url="{{ url('mylaporsDeleteAll') }}">Delete All Selected</a>
                      @endif
                        </div>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengirim</th>
                                    <th>Judul Laporan</th>
                                    <th>Action</th>
                                    <th width="50px"><input type="checkbox" id="master">Pilih Semua</th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach($collection as $index => $item)
                                <tr>
                                    
                                    <td>{{ $index + $collection->firstItem()}}</td>
                                    @if($item->id_user == null)
                                    <td>Masyarakat Umum</td>
                                    @else
                                    <td>{{ $item->user->username }}</td>
                                    @endif
                                    <td>{{ $item->judul }}</td>
                                    <td>
                                      @if(Auth::user()->role == 'admin')
                                        <a href="{{ route ('lapor.show' , $item->id) }}" title="Lihat "><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <form method="POST" action="{{ route ('lapor.destroy' , $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                  
                                      </td>
                                      <td><input type="checkbox" class="sub_chk" data-id="{{$item->id}}"></td>
                                      @endif
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $collection->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@elseif(Auth::user()->role == 'user')
<div class="card-header">Formulir Lapor Pertamanan</div>
            <div class="card-body">
                
                <form action="{{ route ('lapor.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <label>Judul Laporan</label></br>
                  <div class="input-group mb-3">
                  <input type="text" name="judul" id="judul" class="form-control @error('judul') is invalid @enderror">
                </div>
                  @error('judul')
                  <div class="alert alert-danger">{{ 'The title field is required'}}</div>
                  @enderror
                </br>
                  <label>Isi Keluhan</label></br>
                  <div class="input-group mb-3">
                  <input type="text" name="Isi_Keluhan" id="Isi_Keluhan" class="form-control  @error('Isi_Keluhan') is invalid @enderror">
                </div>
                  @error('Isi_Keluhan')
                  <div class="alert alert-danger">{{ 'The complaint field is required'}}</div>
                  @enderror
                </br>
                  <label>Gambar</label></br>
                  <div class="input-group mb-3">
                  <input type="file" name="Choose_File" id="Choose_File"  @error('Choose_File') is invalid @enderror"  style="height: auto">
                </div>
                  @error('Choose_File')
                  <div class="alert alert-danger">{{ 'The choose picture field is required' }}</div>
                  @enderror
                  <br>
              

                  <input type="submit" value="Kirim" class="btn btn-success"></br>
              </form>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
             
</div>
</div>
</div>
</div>
</div>
</div>
</div>
      
 @endif
<br>
  
</x-web-layout>

<script>
  $(document).ready(function() {
        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  


            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  


                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  


                    var join_selected_values = allVals.join(","); 


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {
                          _token: "{{ csrf_token() }}",
                          ids: join_selected_values,
                        },
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });


        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
  })
</script>