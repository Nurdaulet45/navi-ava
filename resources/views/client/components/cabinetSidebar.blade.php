<div class="cabinet-sidebar">
    <div class="profile-progressbar">
        <div class="middle-circle">{{ $user->roleFullInformationProcent()}}%</div>
        <div class="progress-spinner"
             style="background: conic-gradient(#6e8dfc {{ $user->roleFullInformationProcent()}}%, #dde4ff {{ $user->roleFullInformationProcent() + 10}}%);"></div>
    </div>
    <div class="title">
        ЗАПОЛНЕННОСТЬ ПРОФИЛЯ
    </div>
    <p>Расскажите о себе больше — увеличьте шанс найти
        себе {{SessionRoleService::textByRole('ученика','ученика','наставника','услуга не опеделен') }}</p>
</div>
