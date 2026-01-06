@extends('layouts.admin')

@section('content')
<h2 class="mb-4">إدارة الحجوزات</h2>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>الاسم</th>
                        <th>الجوال</th>
                        <th>التاريخ والوقت</th>
                        <th>الضيوف</th>
                        <th>الحالة</th>
                        <th>ملاحظات</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservations as $res)
                    <tr>
                        <td>{{ $res->name }}</td>
                        <td>{{ $res->phone }}</td>
                        <td>
                            {{ $res->reservation_date->format('Y-m-d') }}<br>
                            <small class="text-muted">{{ $res->reservation_time }}</small>
                        </td>
                        <td>{{ $res->guests }}</td>
                        <td>
                            @if($res->status == 'pending')
                                <span class="badge bg-warning text-dark">انتظار</span>
                            @elseif($res->status == 'confirmed')
                                <span class="badge bg-success">مؤكد</span>
                            @else
                                <span class="badge bg-danger">ملغي</span>
                            @endif
                        </td>
                        <td>{{ Str::limit($res->notes, 30) }}</td>
                        <td>
                            <form action="{{ route('admin.reservations.update', $res->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                @if($res->status == 'pending')
                                    <button type="submit" name="status" value="confirmed" class="btn btn-sm btn-success" title="تأكيد"><i class="fas fa-check"></i></button>
                                    <button type="submit" name="status" value="cancelled" class="btn btn-sm btn-danger" title="إلغاء"><i class="fas fa-times"></i></button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">لا توجد حجوزات.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white">
        {{ $reservations->links() }}
    </div>
</div>
@endsection
