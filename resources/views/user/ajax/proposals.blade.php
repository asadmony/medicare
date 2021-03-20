<div class="box-body" style="background: #ddd; min-height: 400px;">
 
            @foreach($proposals as $proposal)

            <div class="proposal-card-container">
            	
                @include('user.includes.cards.proposalCard')
            </div> 
 
            @endforeach
 
 

        

    </div>
    <div class="box-footer my-related-user-links">
        {{ $proposals->links() }}
    </div>