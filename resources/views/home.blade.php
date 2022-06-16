@extends('layouts.site')
@section('content')
    <h3 class="mt-3">Comments</h3>
    <Items @update-items="updateItems" @set-modal-data="setModalData" @set-parent-id="setParentId" ref="items" :items='items' />
    <script>
        window.commentItems = @json($comments);
    </script>
@endsection
