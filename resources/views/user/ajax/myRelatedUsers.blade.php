<div class="box-body" style="background: #ddd; min-height: 400px;">
 
            @foreach($users as $user)

             @if($v == 'my_contacts')

             	@include('user.includes.cards.userContactCard') 

             @else
 
                @include('user.includes.cards.userCard')

             @endif
 
            @endforeach
 
 

        

    </div>
    <div class="box-footer my-related-user-links">
        {{ $users->links() }}
    </div>