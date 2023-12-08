


<x-web-layout title="Home">
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
            @if(session()->has('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center; color:rgb(255, 8, 8)">
              {{ session('delete') }}
            </div>
        @endif
<div class="container">
    <div class="row">
            <div class="card">
                <div class="card-header">Jadwal Pemeliharaan Taman</div>
                <div class="card-body">
                    <div style="text-align: right">
                  @if(Auth::user()->role == 'admin')
                    <a href="{{ route ('jadwal.create') }}" class="btn btn-success btn-sm" title="Add New Jadwal">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <a href="{{ route('jadwal.export_excel') }}" class="btn btn-success btn-sm" target="_blank">EXPORT EXCEL</a>
                    <button class="btn btn-sm btn-danger delete_all" data-url="{{ url('myjadwalDeleteAll') }}">Delete All Selected</a>
                    @endif
                      </div>
                  </div>
                  </div>
                  </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                             
                                <tr>
                      
                                    <th>No</th>
                                    <th width="100px">Tanggal</th>
                                    <th>Lokasi</th>
                                    <th>Nama Petugas</th>
                                    <th>Tugas dan Pekerjaan</th>
                                    @if(Auth::user()->role == 'admin')
                                    <th>Actions</th>
                                    <th width="50px"><input type="checkbox" id="master">Pilih Semua</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>                          
                                <tr>
                                  @foreach($collection as $index => $item)
                                  <tr id="sid{{$item->id}}">
                                    <td>{{ $index + $collection->firstItem() }}</td>
                                    <td  width="100px">{{ $item->tanggal }}</td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td>{{ $item->nama_petugas }}</td>
                                    <td>{{ $item->tugas }}</td>
                                    <td>
                                      @if(Auth::user()->role == 'admin')
                                        <a href="{{ route ('jadwal.edit' , $item->id ) }}" title="Edit "><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        <form method="POST" action="{{ route ('jadwal.destroy' , $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                          </form>
                                          &nbsp;&nbsp;&nbsp;&nbsp;
                                          
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