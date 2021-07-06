@extends('layouts.app')

@section('content')
<div class="container lg:w-2/3 mx-auto">

    <livewire:post-card :post="$post"/>

    <livewire:create-comment :post="$post"/>
    <livewire:show-comments :post="$post" :key="time().$post->id"/>

    <a href="/home" class="button button-green">رجوع</a>


</div>

@endsection
@section('scripts')
<script>

  $(document).ready(function () {
      $('.make_reply').on('click', function () {
         // find the id of make reply button
        var id = $(this).attr('id');

     $(`textarea[data-textarea='${id}']`).focus()

        // hid all reply class which not the same data id of the make reply id
        $(`.reply:not([data-id=${id}])`).addClass('hidden');
        // show the reply class which match the data id and the make reply id
        $(`.reply[data-id='${id}']`).toggleClass('hidden');

      })
  })

</script>
@endsection
