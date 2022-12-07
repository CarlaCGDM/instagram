@props([
'nick'=>'text',
'name' => 'text',
'surname' => 'text',
'created_at'=>'text',
'images'=>'text',
'comments'=>'text',
'likes'=>'text',
'bio'=>'text',
'avatar'=>'text',
'user_id'=>'text',
])

<!-- component -->
<div class="bg-gray-100 p-1">
    <div class="bg-white border rounded-sm">
        <!--formulario del header-->
        <form method="GET" action="{{ route('user-index') }}" style="display:flex; flex-direction:row; justify-content: space-between;">
            <input type=hidden name="user_id" value="{{ $user_id }}">
            <div class="flex items-center px-4 py-3">
            <!--avatar-->
                <button type="submit"><img class="h-16 w-16 rounded-full" src="{{ $avatar }}" /></button>
            <!--avatar end-->
            <!--nombre, descripcion, nick-->
                <div class="ml-3 ">
                    <button type="submit" style="display:flex; flex-direction:row; gap: 5px;">
                        <span class="text-sm font-semibold antialiased block leading-tight">{{ $name }}</span><span class="text-sm font-semibold antialiased block leading-tight">{{ $surname }}</span><span class="text-gray-600 text-sm antialiased block leading-tight">@_{{ $nick }}</span>
                    </button>
                    <p style="padding:10px;" class="text-sm">{{ $bio }}</p>
                </div>
            <!--nombre, descripcion, nick end-->
            </div>
            <!--stats-->
            <div  class="flex items-center px-4 py-3" style="gap: 5px;">
                <span class="text-gray-600 text-sm antialiased block leading-tight">{{ $created_at }}</span>
            </div>
            <!--stats end-->
        </form>
        <!--formulario del header end-->
        
    </div>
</div>
