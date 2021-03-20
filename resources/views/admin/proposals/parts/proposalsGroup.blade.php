<section class="content-header">
    <h1>
    Users
    <small>{{ str_replace('_', ' ', $type) }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
        <li class="active">{{ str_replace('_', ' ', $type) }}</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-12">
            @include('alerts.alerts')
            <div class="box box-widget ">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-th"></i> {{ str_replace('_', ' ', $type) }}</h3>
                    
                </div>
                <div class="box-body" style="background: #ddd;">
                    @foreach($proposalsAll as $proposal)
                     @include('admin.proposals.includes.cards.proposalCard')
                    @endforeach
                </div>
                <div class="box-footer text-center">
                    {{$proposalsAll->render()}}
                </div>
            </div>
            
        </div>
    </div>
    <!-- /.row -->
    
    
</section>