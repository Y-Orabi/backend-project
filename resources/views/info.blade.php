@foreach($users as $user)
   <div class="user-info">
         <h2>{{ $user->name }}</h2>
         <!-- <p>Email: {{ $user->email }}</p>
        <p>Age: {{ $user->age }}</p> -->
    </div>
@endforeach
