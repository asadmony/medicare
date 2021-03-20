@extends('company.layouts.companyMaster')

@push('css')
@endpush

@section('content')
  <section class="content">

  	<br>

  	 <div class="row">
      
      <div class="col-sm-12">

        <?php $url = url('http://fdweb.18gps.net/user/tracking.html?v=2020.181.077.12.32&lang=en&monitorUrl=&requestSource=web&school_id='.$company->school_id.'&mapType=GOOGLE&custid='.$company->school_id.'&loginUrl=&mds='.$company->mds.'&objectid='.$product->objectid.'&custname='.$product->platenumber); ?>


      
      {{-- <iframe src="{!! $url !!}" name="Monitor" height="700px" width="100%" title="{{ $product->title }}"></iframe> --}}

      <embed type="text/html" src="{!! $url !!}" width="100%" height="600">

      </div> 
     </div>
  
  </section>
@endsection


@push('js')

@endpush

