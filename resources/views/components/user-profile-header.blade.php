@props([
  'nick'=>'text',
  'bio'=>'text',
  'avatar'=>'text',
  ])


<div class="flex flex-col justify-center items-center my-5">
    <img class="w-24 h-24 bg-cover bg-center bg-no-repeat rounded-full mt-6" src="{{ $avatar }}"/>
    <span class="my-3">@_{{ $nick }}</span>
    <p class="mb-3">{{ $bio }}</p>
</div>