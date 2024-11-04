<?php

/**
 * Template name: Event Detail
 */
get_header();

?>
<div class="event-detail">
    <section class="main-content">
        <div class="container">
            <div class="detail">
                <div class="stick-left">
                    <div class="button-list">
                        <a href="#" class="">
                            <figure>
                                <img src="/assets/image/icon/fb-detail.svg" alt="">
                            </figure>
                        </a>
                        <a href="#" class="">
                            <figure>
                                <img src="/assets/image/icon/mail-detail.svg" alt="">
                            </figure>
                        </a>
                        <a href="#" class="">
                            <figure>
                                <img src="/assets/image/icon/link-detail.svg" alt="">
                            </figure>
                        </a>
                    </div>
                </div>
                <div class="right">
                    <h1>Prosperity Dining 11/11</h1>

                    <div class="main">
                        <div class="top">
                            <h2>Date and time</h2>
                            <div class="col">
                                <div class="item">
                                    <figure>
                                        <img src="/assets/image/icon/Calendar.svg" class="" alt="">
                                    </figure>
                                    <span>11.1.2024</span>
                                </div>
                                <div class="item">
                                    <figure>
                                        <img src="/assets/image/icon/clock-circle.svg" class="" alt="">
                                    </figure>
                                    <span>9am to 10pm</span>
                                </div>
                            </div>
                            <button class="button-primary open-modal" data-modal="modalEventBooking">
                                Book Event
                            </button>
                        </div>
                        <div class="context">
                            <h2>Event description</h2>
                            <p>
                                Planning an event? We've got a fantastic deal just for you! Book your next event
                                with us
                                and enjoy 5 FREE BOTTLES OF BEERS per table! (3 tables booked or more) 🍻✨
                                Whether it's a birthday bash, family gathering, or corporate event, Nam Phuong -
                                Jimmy
                                Carter is the perfect place to celebrate. Our delicious food, vibrant atmosphere,
                                and
                                now, free beers, will make your event unforgettable!
                                <br>
                                🥳 Here's the deal:
                                1. Book your event at Nam Phuong - Jimmy Carter.
                                2. Reserve at least 3 tables or more for Tuesday, Wednesday or Thursday.
                                3. Enjoy 5 FREE BOTTLES OF BEERS per table.
                                It's our way of saying thank you for choosing us to be part of your special moments.
                                So
                                gather your friends, family, or colleagues and let's celebrate with amazing food and
                                drinks! 🎈🍽️
                                Hurry, book your event now and take advantage of this awesome offer. Cheers to great
                                times at Nam Phuong - Jimmy Carter! 🥂
                            </p>
                        </div>
                        <div class="tag">
                            <h2>Tags</h2>
                            <div class="tag-wrap">
                                <button class="tag-item">
                                    Promotion
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="other">
                <h2>Other events you may like</h2>
                <div class="grid-view">
                    <div class="item-view">
                        <div class="image">
                            <figure>
                                <img src="/assets/image/promotion-img.png" alt="">
                            </figure>
                        </div>
                        <div class="context">
                            <span>promotion</span>
                            <h2>Giant fried chicken sandwich</h2>
                            <div class="row">
                                <div class="item">
                                    <figure>
                                        <img src="/assets/image/icon/Calendar.svg" class="" alt="">
                                    </figure>
                                    <span>11.1.2024</span>
                                </div>
                                <div class="item">
                                    <figure>
                                        <img src="/assets/image/icon/Clock-circle.svg" class="" alt="">
                                    </figure>
                                    <span>9am to 10pm</span>
                                </div>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tristique porta nunc,
                                at
                                accumsan nibh iaculis eu. Vivamus ultrices velit vitae velit ornare at accumsan nibh
                                iaculis eu.
                            </p>
                        </div>
                    </div>
                    <div class="item-view">
                        <div class="image">
                            <figure>
                                <img src="/assets/image/promotion-img.png" alt="">
                            </figure>
                        </div>
                        <div class="context">
                            <span>promotion</span>
                            <h2>Giant fried chicken sandwich</h2>
                            <div class="row">
                                <div class="item">
                                    <figure>
                                        <img src="/assets/image/icon/Calendar.svg" class="" alt="">
                                    </figure>
                                    <span>11.1.2024</span>
                                </div>
                                <div class="item">
                                    <figure>
                                        <img src="/assets/image/icon/Clock-circle.svg" class="" alt="">
                                    </figure>
                                    <span>9am to 10pm</span>
                                </div>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tristique porta nunc,
                                at
                                accumsan nibh iaculis eu. Vivamus ultrices velit vitae velit ornare at accumsan nibh
                                iaculis eu.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="cta">
        <div class="context">
            <h2>Where Friends meet & Family gather</h2>
            <p>Vietnamese cuisine</p>
            <a target="_blank" href="#" class="cta-bu-tton">lOCATION AT JIMMY CARTER</a>
        </div>
    </section>
</div>

<div id="modalEventBooking" class="modal-wrapper">
    <div class="modal-container">
        <div class="modal-head">
            <h2>Event Booking</h2>
            <span>Prosperity Dining 11/11</span>
            <button class="close-modal">
                <figure>
                    <img src="/assets/image/icon/close.svg" alt="">
                </figure>
            </button>
        </div>
        <div class="modal-content">
            <form action="" class="event-form">
                <div class="row-1">
                    <div class="input-row">
                        <label>Title <span style="color: #dc2222;">*</span></label>
                        <select name="" class="input-field" id="">
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="input-row">
                        <label>Name <span style="color: #dc2222;">*</span></label>
                        <input type="text" class="input-field" placeholder="Enter your name">
                    </div>
                    <div class="input-row">
                        <label>Email <span style="color: #dc2222;">*</span></label>
                        <input type="email" class="input-field" placeholder="Enter your email">
                    </div>
                    <div class="input-row">
                        <label>Phone <span style="color: #dc2222;">*</span></label>
                        <input type="text" class="input-field" placeholder="Enter your phone number">
                    </div>
                </div>
                <div class="row-2">
                    <div class="input-row">
                        <label>Date <span style="color: #dc2222;">*</span></label>
                        <select name="" class="input-field" id="">
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="input-row">
                        <label>Time <span style="color: #dc2222;">*</span></label>
                        <input type="text" class="input-field" placeholder="Choose the time">
                    </div>
                    <div class="input-row">
                        <label>Number of Person(s)</label>
                        <input type="number" class="input-field" placeholder="Enter your number of persons">
                    </div>
                </div>
                <div class="input-row">
                    <label>Message</label>
                    <textarea type="text" class="input-field" rows="5" cols="10" placeholder="Your message"></textarea>
                </div>

                <button class="confirm button-primary">
                    Send request
                </button>
            </form>


        </div>

        <div class="illus-modal">
            <figure class="">
                <img src="/assets/image/modal-illus.svg" alt="">
            </figure>
        </div>
    </div>
</div>
<!-- modal script -->
<script defer src="/assets/js/modal.js"></script>

<?php

get_footer();
?>