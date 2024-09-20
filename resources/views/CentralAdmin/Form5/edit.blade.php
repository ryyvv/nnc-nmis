<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Form5 PNAO',
'activePage' => 'form5a',
'activeNav' => '',
])

@section('content')
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; align-items:center;">
                        <a href="{{route('form5.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
                        <h4>Edit Form 5 PNAO</h4>
                    </div>

                    <form action="{{ route('form5.update', $form->id) }}" method="POST" id="form">
                            @csrf

                    <input type="hidden" value="draft" name="formrequest" id="formrequest" />
                    <input type="hidden" value="{{ $form->id }}" name="id" id="id" />
                    <input type="hidden" value="" name="status" id="status" />
                    
                    <div class="container">
                      <div class="row">
                        <div class="col">
                            <label for="sex">Letter:<span style="color:red">*</span> </label>
                            <input name="column1" class="form-control" value="{{ $form->column1 }}" />
                            @error('column1')
                                 <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                        <label for="sex">Elements:<span style="color:red">*</span> </label>
                            <input name="column2" class="form-control" value="{{ $form->column2 }}" />
                            @error('column2')
                                 <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>
                      
                      <br />
                      <div class="row"><h6>Performance Level</h6></div>
                       
                      <div class="row">
                        <div class="col">
                         <label for="sex">1<span style="color:red">*</span> </label>
                         <textarea name="column3" class="form-control">{{ $form->column3 }}</textarea>
                             @error('column3')
                                 <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                         <label for="sex">2<span style="color:red">*</span> </label>
                         <textarea name="column4" class="form-control">{{ $form->column4 }}</textarea>
                         @error('column4')
                                 <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                         <label for="sex">3<span style="color:red">*</span> </label>
                         <textarea name="column5" class="form-control">{{ $form->column5 }}</textarea>
                         @error('column5')
                                 <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                         <label for="sex">4<span style="color:red">*</span> </label>
                         <textarea name="column6" class="form-control">{{ $form->column6 }}</textarea>
                         @error('column6')
                                 <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                         <label for="sex">5<span style="color:red">*</span> </label>
                         <textarea name="column7" class="form-control">{{ $form->column7 }}</textarea>
                         @error('column7')
                                 <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                         <label for="sex">Document Source<span style="color:red">*</span> </label>
                         <textarea name="column8" class="form-control">{{ $form->column8 }}</textarea>
                        </div>
                      </div>

                    </div>

                    <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                  Save
                              </button>
                      
                          </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Modal.Submit')








@endsection