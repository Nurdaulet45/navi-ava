<div class="cabinet-sidebar">
    <div class="profile-progressbar">
        <div class="middle-circle">{{ $user->roleFullInformationProcent()}}%</div>
        <div class="progress-spinner"
             style="background: conic-gradient(#6e8dfc {{ $user->roleFullInformationProcent()}}%, #dde4ff {{ $user->roleFullInformationProcent() + 10}}%);"></div>
    </div>
    <div class="title">
        ЗАПОЛНЕННОСТЬ ПРОФИЛЯ
    </div>
    <p>Расскажите подробнее об этой обучающей программе, чему именно вы на ней обучились, какие навыки вам удалось в себе развить по окончанию и т.д.</p>

</div>
