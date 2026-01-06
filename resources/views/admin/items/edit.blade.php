@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>تعديل الطبق: {{ $item->name }}</h2>
    <a href="{{ route('admin.items.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-right me-2"></i> عودة للقائمة</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">اسم الطبق <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="category_id" class="form-label">القسم <span class="text-danger">*</span></label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="">اختر القسم...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">الوصف</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $item->description }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">السر (ريال) <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $item->price }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">صوة الطبق</label>
                    @if($item->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="Current Image" width="100" class="rounded border">
                        </div>
                    @endif
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" value="1" {{ $item->is_featured ? 'checked' : '' }}>
                <label class="form-check-label" for="is_featured">عرض في الصفحة الرئيسية (طبق مميز)</label>
            </div>

            <button type="submit" class="btn btn-success px-4">تحديث البيانات</button>
        </form>
    </div>
</div>
@endsection
