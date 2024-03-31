{{-- <div class="work-platforms">
    <h1>Platforms we work with</h1>
    <div>
        <span>YouTube</span>
        <span>TikTok</span>
        <span>Facebook</span>
        <span>Twitch</span>
        <span>Instagram</span>
    </div>
</div> --}}
<div class="tabs-container">
    <ul class="nav nav-pills" id="portfolio-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-youTube-tab" data-bs-toggle="pill"
                data-bs-target="#pills-youTube" type="button" role="tab" aria-controls="pills-youTube"
                aria-selected="true">
                YouTube
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-tiktok-tab" data-bs-toggle="pill" data-bs-target="#pills-tiktok"
                type="button" role="tab" aria-controls="pills-tiktok" aria-selected="false"
                onclick="loadData(2)">
                TikTok
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-facebook-tab" data-bs-toggle="pill"
                data-bs-target="#pills-facebook" type="button" role="tab" aria-controls="pills-facebook"
                aria-selected="false" onclick="loadData(3)">
                Facebook
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-twitch-tab" data-bs-toggle="pill" data-bs-target="#pills-twitch"
                type="button" role="tab" aria-controls="pills-twitch" aria-selected="false"
                onclick="loadData(4)">
                Twitch
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-instagram-tab" data-bs-toggle="pill"
                data-bs-target="#pills-instagram" type="button" role="tab"
                aria-controls="pills-instagram" aria-selected="false" onclick="loadData(5)">
                Instagram
            </button>
        </li>
    </ul>
    <div class="tab-content" id="portfolio-tabContent">
        <div class="tab-pane fade show active" id="pills-youTube" role="tabpanel"
            aria-labelledby="pills-youTube-tab" tabindex="0">
            <div class="activity-cards" id="campaign-cards-1"></div>
        </div>
        <div class="tab-pane fade" id="pills-tiktok" role="tabpanel" aria-labelledby="pills-tiktok-tab"
            tabindex="0">
            <div class="activity-cards" id="campaign-cards-2"></div>
        </div>
        <div class="tab-pane fade" id="pills-facebook" role="tabpanel" aria-labelledby="pills-facebook-tab"
            tabindex="0">
            <div class="activity-cards" id="campaign-cards-3"></div>
        </div>
        <div class="tab-pane fade" id="pills-twitch" role="tabpanel" aria-labelledby="pills-twitch-tab"
            tabindex="0">
            <div class="activity-cards" id="campaign-cards-4"></div>
        </div>
        <div class="tab-pane fade" id="pills-instagram" role="tabpanel" aria-labelledby="pills-instagram-tab"
            tabindex="0">
            <div class="activity-cards" id="campaign-cards-5"></div>
        </div>
    </div>
</div>
