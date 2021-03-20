@if((!$me->contactInfo) or
(!$me->personalInfo) or
(!$me->personalActivity) or
(!$me->searchTermBasic()))
<div class="alert alert-danger w3-deep-orange">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Dear {{ $me->name }}</strong>, Please update

  @if(!$me->contactInfo)
  <a href="" class=" no-padding btn-menu-to-container" data-url="{{ route('user.myAsset', 'setting_contact_info') }}">
    Contact Info</a>,
  @endif

  @if(!$me->personalInfo)
  <a href="" class=" no-padding btn-menu-to-container" data-url="{{ route('user.myAsset', 'setting_personal_info') }}">
    Personal Info</a>,

  @elseif($me->personalInfo)
  @if(!$me->personalInfo->district or
  !$me->personalInfo->education_level or
  !$me->personalInfo->my_profession or
  !$me->personalInfo->marital_status)
  <a href="" class=" no-padding btn-menu-to-container" data-url="{{ route('user.myAsset', 'setting_personal_info') }}">
    Personal Info (with district, education level, profession, marital status)</a>,
  @endif
  @endif

  @if(!$me->personalActivity)
  <a href="" class=" no-padding btn-menu-to-container"
    data-url="{{ route('user.myAsset', 'setting_personal_activity') }}"> Personal Activity</a>,
  @endif

  @if(!$me->searchTermBasic())
  <a href="" data-url="{{ route('user.myAsset','search_setting') }}"
    class=" no-padding btn-menu-to-container w3-text-white"> Partner Preference</a>
  @endif.
  Otherwise, your profile will not be shown to others and you also can not see others profile.
</div>
@endif