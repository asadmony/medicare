<?php

return array(

    // {{ route('imagecache',['template'=>'ppsm','filename'=>$user->profilePic()]) }}

    'route'=>'uslive',
 

     'paths' => array(

        public_path('img'),  
        public_path('storage/user'),  
        public_path('storage/course'),
        public_path('storage/product/media/brand'),
        public_path('storage/product/media/category'),
        public_path('storage/product/media/subcategory'),
        public_path('storage/coupon/media/featureimage'),
        public_path('storage/product/media/galleryimage'),
        public_path('storage/product/media/featureimage'),
        public_path('storage/product/media/subsubcategory'),

    ),


    'templates' => array(

        'small' => 'Intervention\Image\Templates\Small',
        'medium' => 'Intervention\Image\Templates\Medium',
        'large' => 'Intervention\Image\Templates\Large',
        'ppxxs' => 'App\ImageFilters\ProfilePicXXS',
        'fifh' => 'App\ImageFilters\FeatureImageForHome',
        'ppxs' => 'App\ImageFilters\ProfilePicXS',
        'ppsm' => 'App\ImageFilters\ProfilePicSmall',
        'ppsmbl' => 'App\ImageFilters\ProductPicSmallBlur',
        'ppmd' => 'App\ImageFilters\ProfilePicMedium',
        'pplg' => 'App\ImageFilters\ProfilePicLarge',
        'ppxlg' => 'App\ImageFilters\ProfilePicXLarge',
        'cpxs' => 'App\ImageFilters\CoverPicXS',
        'cpxxxs' => 'App\ImageFilters\CoverPicXXXS',
        'cpsm' => 'App\ImageFilters\CoverPicSmall',
        'crspsm' => 'App\ImageFilters\CoursePicSmall',        
        'cpmd' => 'App\ImageFilters\CoverPicMedium',
        'cplg' => 'App\ImageFilters\CoverPicLarge',
        'cpxlg' => 'App\ImageFilters\CoverPicXLarge',
        'cpxxlg' => 'App\ImageFilters\CoverPicXXLarge',
        'slmd' => 'App\ImageFilters\LogoMedium',
        'pfilg' => 'App\ImageFilters\ProductPicLarge',
        'pfimd' => 'App\ImageFilters\ProductPicMedium',
        'pfism' => 'App\ImageFilters\ProductPicSmall',
        'pnism' => 'App\ImageFilters\ProductNormalPicSmall',
        'pnimd' => 'App\ImageFilters\ProductNormalPicMedium',
        'pnilg' => 'App\ImageFilters\ProductNormalPicLarge',
        'sbism' => 'App\ImageFilters\SidebarImageSmall',
        'sbixs' => 'App\ImageFilters\SidebarImageXtraSmall',
        'lh' => 'App\ImageFilters\LogoHeader',
    ),

 
    'lifetime' => 43200,

);
