@role('Admin')
@extends('layouts.app')

@section('content')
<livewire:posts-table :posts="$posts" />

@endsection
@endrole
