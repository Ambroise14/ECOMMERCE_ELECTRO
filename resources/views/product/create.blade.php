@extends('base')
@section('content')
<div class="col-md-6 offset-md-3 shadow-none p-3 mb-5 bg-light rounded">
  <form action="{{route('product.methodes')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-12">
      <select class="form-select" aria-label="Default select example" name="category">
        @foreach($list as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
      </div>
      <div class="col-6">
        <div class="form-group">
          Ref:
          <input type="text" name="ref" value="{{old('ref')}}" class="form-control">
          @error('ref')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          Name:
          <input type="text" name="name" value="{{old('name')}}" class="form-control">
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          Price:
          <input type="text" name="price" value="{{old('price')}}" class="form-control">
          @error('price')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
      <div class="col-3 mt-4">
        <div class="form-group">
        statut
          <input type="checkbox" name="status" value="1">
         
        </div>
      </div>

      <div class="col-3 mt-4">
        <div class="form-group">
        popular
          <input type="checkbox" name="status" value="1">
         
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
         Description :
          <textarea name="description" class="form-control">{{old('description')}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
    
      
      <div class="col-12">
        <div class="form-group">
        Image
          <input type="file" name="image" class="form-control">
          @error('image')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
       Gallery
          <input type="file" name="photos[]" class="form-control" multiple>
         
        </div>
        <button class="btn btn-success mt-2" type="submit">save</button>
      </div>
    </div>
  </form>
</div>
@endsection