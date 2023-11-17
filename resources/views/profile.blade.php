<div class="w-64 mx-auto bg-[#20354b] rounded-2xl px-8 py-6 shadow-lg">
    
    <div class="mt-6 w-fit mx-auto">
        <img src="https://api.lorem.space/image/face?w=120&h=120&hash=bart89fe" class="rounded-full w-28 "
            alt="profile picture" srcset="">
    </div>

    <div class="mt-8 ">
        <h2 class="text-white font-bold text-2xl tracking-wide">{{$user->nombre}}</h2>
        <p class="text-gray-400 font-normal">CC: {{$user->cedula}}</p>
        <p class="text-gray-400 font-normal">Tel: {{$user->telefono}}</p>
        <p class="text-gray-400 font-normal">Dir: {{$user->direccion}}</p>
    </div>
</div>