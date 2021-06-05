<?php require_once(ROOT . '/views/header_and_footer/header.php') ?>
<section class="ptb-30">
    <div class="container">
        <div class="row">

            <div class="order-1 order-lg-0 col-md-12 col-lg-8">
                <div class="ptb-0">
                    <h2 class="mtb-20"><b>Изменение профиля</b></h2>
                </div>
                <? if (isset($errors2)) {
                    echo $errors2;
                } ?>
                <form action="#" method="post">
                    <h4>Введите улицу:</h4>
                    <div class="input-group mb-3">
                        <select class="btn form-control" size="1" name="street">
                            <? foreach ($streets as $item) { ?>
                                <option value="<?= $item['id'] ?>"><?= $item['street'] ?></option>
                            <? } ?>
                        </select>
                    </div>
                    <h4>Введите дом:</h4>
                    <div class="input-group mb-3">
                        <input type="number" name="house" class="form-control" aria-label="Дом"
                               value="<?= $street['house'] ?>">
                        <div class="input-group-append">
                            <span class="input-group-text">Дом</span>
                        </div>
                    </div>
                    <div class="order-1 order-lg-0 col-md-12">
                        <div class="ptb-0">
                            <a class="float-right">
                                <button name="submit" type="submit" class="site-btn">Изменить</button>
                            </a>
                        </div>
                    </div>
                </form>
                <form class="mt-50" action="#" method="post" enctype="multipart/form-data" id="myForm">
                    <h4>Изменить фото профиля:</h4>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Загрузить</span>
                        </div>
                        <div class="custom-file">
                            <input name="myfile" id="customFile" type="file" class="custom-file-input"
                                   accept=".jpg, .jpeg, .png ">
                            <label id="namefile" class="custom-file-label" for="customFile">Выбрать файл</label>
                        </div>
                    </div>
                    <div class="order-1 order-lg-0 col-md-12">
                        <div class="ptb-0">
                            <a class="float-right">
                                <button name="submit2" type="submit" class="site-btn">Изменить</button>
                            </a>
                        </div>
                    </div>
                </form>


                <form class="mt-50" action="#" method="post" >
                    <h4>Изменить реквизиты карты:</h4>


                        <div class="wrapper" id="app">
                            <div class="card-form">
                                <div class="card-list">
                                    <div class="card-item" v-bind:class="{ '-active' : isCardFlipped }">
                                        <div class="card-item__side -front">
                                            <div class="card-item__focus"
                                                 v-bind:class="{'-active' : focusElementStyle }"
                                                 v-bind:style="focusElementStyle" ref="focusElement"></div>
                                            <div class="card-item__cover">
                                                <img
                                                        v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + currentCardBackground + '.jpeg'"
                                                        class="card-item__bg">
                                            </div>

                                            <div class="card-item__wrapper">
                                                <div class="card-item__top">
                                                    <img
                                                            src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/chip.png"
                                                            class="card-item__chip">
                                                    <div class="card-item__type">
                                                        <transition name="slide-fade-up">
                                                            <img
                                                                    v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + getCardType + '.png'"
                                                                    v-if="getCardType" v-bind:key="getCardType" alt=""
                                                                    class="card-item__typeImg">
                                                        </transition>
                                                    </div>
                                                </div>
                                                <label for="cardNumber" class="card-item__number" ref="cardNumber">
                                                    <template v-if="getCardType === 'amex'">
                <span v-for="(n, $index) in amexCardMask" :key="$index">
                  <transition name="slide-fade-up">
                    <div class="card-item__numberItem"
                         v-if="$index > 4 && $index < 14 && cardNumber.length > $index && n.trim() !== ''">*</div>
                    <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }" :key="$index"
                         v-else-if="cardNumber.length > $index">
                      {{cardNumber[$index]}}
                    </div>
                    <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }" v-else
                         :key="$index + 1">{{n}}</div>
                  </transition>
                </span>
                                                    </template>

                                                    <template v-else>
                <span v-for="(n, $index) in otherCardMask" :key="$index">
                  <transition name="slide-fade-up">
                    <div class="card-item__numberItem"
                         v-if="$index > 4 && $index < 15 && cardNumber.length > $index && n.trim() !== ''">*</div>
                    <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }" :key="$index"
                         v-else-if="cardNumber.length > $index">
                      {{cardNumber[$index]}}
                    </div>
                    <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }" v-else
                         :key="$index + 1">{{n}}</div>
                  </transition>
                </span>
                                                    </template>
                                                </label>
                                                <div class="card-item__content">
                                                    <label for="cardName" class="card-item__info" ref="cardName">
                                                        <div class="card-item__holder">Card Holder</div>
                                                        <transition name="slide-fade-up">
                                                            <div class="card-item__name" v-if="cardName.length" key="1">
                                                                <transition-group name="slide-fade-right">
                      <span class="card-item__nameItem" v-for="(n, $index) in cardName.replace(/\s\s+/g, ' ')"
                            v-if="$index === $index" v-bind:key="$index + 1">{{n}}</span>
                                                                </transition-group>
                                                            </div>
                                                            <div class="card-item__name" v-else key="2">Full Name</div>
                                                        </transition>
                                                    </label>
                                                    <div class="card-item__date" ref="cardDate">
                                                        <label for="cardMonth"
                                                               class="card-item__dateTitle">Expires</label>
                                                        <label for="cardMonth" class="card-item__dateItem">
                                                            <transition name="slide-fade-up">
                                                                <span v-if="cardMonth"
                                                                      v-bind:key="cardMonth">{{cardMonth}}</span>
                                                                <span v-else key="2">MM</span>
                                                            </transition>
                                                        </label>
                                                        /
                                                        <label for="cardYear" class="card-item__dateItem">
                                                            <transition name="slide-fade-up">
                                                                <span v-if="cardYear"
                                                                      v-bind:key="cardYear">{{String(cardYear).slice(2, 4)}}</span>
                                                                <span v-else key="2">YY</span>
                                                            </transition>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-item__side -back">
                                            <div class="card-item__cover">
                                                <img
                                                        v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + currentCardBackground + '.jpeg'"
                                                        class="card-item__bg">
                                            </div>
                                            <div class="card-item__band"></div>
                                            <div class="card-item__cvv">
                                                <div class="card-item__cvvTitle">CVV</div>
                                                <div class="card-item__cvvBand">
              <span v-for="(n, $index) in cardCvv" :key="$index">
                *
              </span>

                                                </div>
                                                <div class="card-item__type">
                                                    <img
                                                            v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + getCardType + '.png'"
                                                            v-if="getCardType" class="card-item__typeImg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-form__inner">
                                    <div class="card-input">
                                        <label for="cardNumber" class="card-input__label">Номер карты(через пробел)</label>
                                        <input maxlength="19" name="num_cart"  type="text" id="cardNumber" class="card-input__input"
                                               v-mask="generateCardNumberMask"
                                               v-model="cardNumber" v-on:focus="focusInput" v-on:blur="blurInput"
                                               data-ref="cardNumber" autocomplete="off">
                                    </div>

                                    <button name="cart_sub" class="card-form__button">
                                        Отправить
                                    </button>
                                </div>
                            </div>
                        </div>
                </form>
            </div><!-- col-sm-8 -->


            <div class="order-0  order-lg-1 col-md-12 col-lg-4">
                <div class="mt-30 p-30 plr-40 card-view text-center">
                    <h4><b><?= $_SESSION['userLogin'] ?></b></h4>
                    <img class="mtb-20 max-w-100x mlr-auto" src="/template/img/img_user/<?= $_SESSION['userImg'] ?>"
                         alt="">

                    <div class="form-sm max-w-400x mlr-auto">
                        <h6><a href="/user/edit" class="mt-15 plr-20 btn-b-sm btn-fill-primary dplay-block"
                               type="submit"><b>Изменить
                                    профиль</b></a></h6>
                    </div>
                    <div class="form-sm max-w-400x mlr-auto">
                        <h6><a href="/user/history" class="mt-15 plr-20 btn-b-sm btn-fill-primary dplay-block"
                               type="submit"><b>История платежей</b></a></h6>
                    </div>
                    <div class="ptb-0">
                        <h4 class="mtb-20"><b>Ваш
                                адрес:</b><? if ($street != null) { ?> <?= $street['street'] ?> улица, <?= $street['house'] ?> дом<? } else {
                                echo '                    
                        <div class="form-sm max-w-400x mlr-auto">
                        <h6><a href="/user/edit"  class="mt-15 plr-20 btn-b-sm btn-fill-primary dplay-block" type="submit"><b>Указать</b></a></h6>
                    </div>';
                            } ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(
        function () {
            var avatar = $('#customFile');
            avatar.change(function () {
                if (($("#customFile")[0].files).length != 0) {
                    document.getElementById('namefile').innerHTML = avatar.val();
                    document.getElementById('namefile').style.display = 'block';
                }
            });
        }
    )
</script>


<?php require_once(ROOT . '/views/header_and_footer/footer.php') ?>
