<?php require_once(ROOT . '/views/header_and_footer/header.php') ?>
<section class="ptb-30">
    <div class="container">
        <div class="row">

            <div class="order-1 order-lg-0 col-md-12 col-lg-8">

                <div class="ptb-0">
                    <h2 class="mtb-20"><b>Ваши счета</b></h2>
                </div>
                <? if (isset($_SESSION["errors3"])) {?><h2 class="mtb-20 alert-success" style="border: #0b2e13 solid 2px; border-radius: 10px" ><?
                        echo $_SESSION["errors3"];
                    ?></h2>
                <h2 class="mtb-20"><?} ?>


                    <? if (isset($errors2)) {
                        echo $errors2;
                    } ?></h2>
                <h2 class="mtb-20"><? if (isset($errors)) {
                        echo $errors;
                    } ?></h2>
                <? foreach ($InvoicesList as $item) { ?>
                    <div>
                        <div class="row">
                            <div class="col-sm-7">
                                <h4>Счет №<?= $item['number'] ?></h4>
                                <p><b>Тип </b>: <?= $item['type'] ?></p>
                            </div>
                            <div class="col-lg-5">
                                <h3 class="float-right ml-4"><?= $item['price'] ?>р</h3>
                                <a>
                                    <button data-toggle="modal" data-target="#item_<?= $item['id'] ?>"
                                            id="<?= $item['id'] ?>" class="site-btn float-right">Оплатить
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="p-30 mb-30 card-view">
                            <h4 class="p-title"><b>Иформация</b></h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><b>Дата выставления счета:</b> <?= $item['date_start'] ?></p>
                                    <p><b>Категория:</b> <?= $item['category'] ?></p>
                                    <p><b>База расчета:</b> <?= $item['base'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Дата просрачивания счета:</b><?= $item['date_stop'] ?></p>
                                    <p><b>Основания:</b> <?= $item['reason'] ?></p>
                                    <p><b>Наиминование услуги:</b> <?= $item['name'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-20 brdr-grey-1 opacty-6"></div>
                        <div class="modal fade" id="item_<?= $item['id'] ?>" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="exampleModalLabel">Для оплаты введите данные карты полностью</h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="wrapper" id="app_<?= $item['id'] ?>">
<!--                                            <form action="#" method="post">-->
                                                <input type="text" name="id_order" value="<?= $item['id'] ?>" style="display: none">
                                                <input type="text" name="id_number" value="<?= $item['number'] ?>" style="display: none">
                                            <div class="card-form">
                                                <div class="card-list">
                                                    <div class="card-item" v-bind:class="{ '-active' : isCardFlipped }">
                                                        <div class="card-item__side -front">
                                                            <div class="card-item__focus"
                                                                 v-bind:class="{'-active' : focusElementStyle }"
                                                                 v-bind:style="focusElementStyle"
                                                                 ref="focusElement"></div>
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
                                                                                    v-if="getCardType"
                                                                                    v-bind:key="getCardType" alt=""
                                                                                    class="card-item__typeImg">
                                                                        </transition>
                                                                    </div>
                                                                </div>
                                                                <label for="cardNumber" class="card-item__number"
                                                                       ref="cardNumber">
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
                                                                    <label for="cardName" class="card-item__info"
                                                                           ref="cardName">
                                                                        <div class="card-item__holder">Card Holder</div>
                                                                        <transition name="slide-fade-up">
                                                                            <div class="card-item__name"
                                                                                 v-if="cardName.length" key="1">
                                                                                <transition-group
                                                                                        name="slide-fade-right">
                      <span class="card-item__nameItem" v-for="(n, $index) in cardName.replace(/\s\s+/g, ' ')"
                            v-if="$index === $index" v-bind:key="$index + 1">{{n}}</span>
                                                                                </transition-group>
                                                                            </div>
                                                                            <div class="card-item__name" v-else key="2">
                                                                                Full Name
                                                                            </div>
                                                                        </transition>
                                                                    </label>
                                                                    <div class="card-item__date" ref="cardDate">
                                                                        <label for="cardMonth"
                                                                               class="card-item__dateTitle">Expires</label>
                                                                        <label for="cardMonth"
                                                                               class="card-item__dateItem">
                                                                            <transition name="slide-fade-up">
                                                                                <span v-if="cardMonth"
                                                                                      v-bind:key="cardMonth">{{cardMonth}}</span>
                                                                                <span v-else key="2">MM</span>
                                                                            </transition>
                                                                        </label>
                                                                        /
                                                                        <label for="cardYear"
                                                                               class="card-item__dateItem">
                                                                            <transition name="slide-fade-up">
                                                                                <span v-if="cardYear"
                                                                                      v-bind:key="cardYear">{{String(cardYear).slice(2,4)}}</span>
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
                                                                            v-if="getCardType"
                                                                            class="card-item__typeImg">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-form__inner">
                                                    <? if ($cart == null) { ?>
                                                    <div class="card-input">
                                                        <label for="cardNumber" class="card-input__label">Card Number</label>
                                                        <input type="text" id="cardNumber" class="card-input__input" v-mask="generateCardNumberMask"
                                                               v-model="cardNumber" v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardNumber" autocomplete="off">
                                                    </div>
                                                    <?}?>
                                                    <div class="card-input">
                                                        <label for="cardName" class="card-input__label">Card
                                                            Holders</label>
                                                        <input  type="text" id="cardName" class="card-input__input"
                                                               v-model="cardName" v-on:focus="focusInput"
                                                               v-on:blur="blurInput" data-ref="cardName"
                                                               autocomplete="off" required>
                                                    </div>
                                                    <div class="card-form__row">
                                                        <div class="card-form__col">
                                                            <div class="card-form__group">
                                                                <label for="cardMonth" class="card-input__label">Expiration
                                                                    Date</label>
                                                                <select  class="card-input__input -select" id="cardMonth"
                                                                        v-model="cardMonth" v-on:focus="focusInput"
                                                                        v-on:blur="blurInput" data-ref="cardDate" required>
                                                                    <option value="" disabled selected>Month</option>
                                                                    <option v-bind:value="n < 10 ? '0' + n : n"
                                                                            v-for="n in 12"
                                                                            v-bind:disabled="n < minCardMonth"
                                                                            v-bind:key="n">
                                                                        {{n < 10 ? '0' + n : n}}
                                                                    </option>
                                                                </select>
                                                                <select  class="card-input__input -select" id="cardYear"
                                                                        v-model="cardYear" v-on:focus="focusInput"
                                                                        v-on:blur="blurInput" data-ref="cardDate" required>
                                                                    <option value="" disabled selected>Year</option>
                                                                    <option v-bind:value="$index + minCardYear"
                                                                            v-for="(n, $index) in 12" v-bind:key="n">
                                                                        {{$index + minCardYear}}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="card-form__col -cvv">
                                                            <div class="card-input">
                                                                <label for="cardCvv"
                                                                       class="card-input__label">CVV</label>
                                                                <input  type="text" class="card-input__input"
                                                                       id="cardCvv" v-mask="'###'" maxlength="3"
                                                                       v-model="cardCvv"
                                                                       v-on:focus="flipCard(true)"
                                                                       v-on:blur="flipCard(false)" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button name="submit2" type="button" data-toggle="modal" data-target="#Check" class="btn btn-secondary card-form__button" data-dismiss="modal">
                                                        Оплатить: <?= $item['price'] ?>р
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                        <a target="_blank" href="/user/polit">Пользовательское соглашение</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="Check" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <strong><h5 class="modal-title" id="exampleModalLabel">Оплата</h5></strong>
                                    </div>
                                    <form action="#" method="post">
                                    <div class="modal-body" style="padding-right:40px;padding-left: 40px">
                                        <div class="row">
                                            <img src="/template/img/kaspi.jpg" style="height: 200px;width: 100%;">
                                        </div>
                                        <div class="text-center ">
                                            <p><strong>Магазин:</strong>SNT"DRUZHBA"</p>
                                        </div>
                                        <div class="text-center "><p><strong>Описание:</strong><?= $item['name'] ?></p></div>
                                        <div class="text-center "><p><strong>Сумма:</strong><?= $item['price'] ?></p></div>
                                        <div class="text-center "><p><strong>Дата:</strong><?= date("d.m.y"); ?></p></div>
                                        <div class="text-center "><p><strong>Номер карты:</strong><? echo mb_strimwidth($cart, 0, 4) . " **** **** ****"; ?></p></div>
                                        <div class="text-center "></div>

                                        <div style="border-top: 1px solid #dedede;">
                                            <p>Одноразовый код был направлен на Ваш номер телефона. Пожалуйста, проверьте реквизиты транзакции и введите одноразовый код.</p>
                                        </div>
                                        <div >
                                            <p>Для получения кодов подтверждения операций подключите номер телефона к СМС-банку в Мобильном приложении СберБанк Онлайн, банкомате или отделении банка.</p>
                                        </div>
                                        <div>
                                            <input name="cod" placeholder="Одноразовый код" type="text" class="card-input__input">
                                        </div>
                                        <input type="text" name="id_order" value="<?= $item['id'] ?>" style="display: none">
                                        <input type="text" name="id_number" value="<?= $item['number'] ?>" style="display: none">
                                    </div>
                                    <div  class="modal-footer" style="padding-right:40px;padding-left: 40px;padding-top: 0px">
                                        <button name="submit" type="submit" class="btn card-form__button">Отправить введеный код</button>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>




                    </div>
                    <script src="https://unpkg.com/vue-the-mask@0.11.1/dist/vue-the-mask.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
                    <script>
                        new Vue({
                            el: "#app_<?= $item['id'] ?>",
                            data() {
                                return {
                                    currentCardBackground: Math.floor(Math.random() * 25 + 1), // just for fun :D
                                    cardName: "",
                                    cardNumber: "",
                                    cardMonth: "",
                                    cardYear: "",
                                    cardCvv: "",
                                    minCardYear: new Date().getFullYear(),
                                    amexCardMask: "#### ###### #####",
                                    otherCardMask: "#### #### #### ####",
                                    cardNumberTemp: "",
                                    isCardFlipped: false,
                                    focusElementStyle: null,
                                    isInputFocused: false
                                };
                            },
                            mounted() {
                                this.cardNumberTemp = this.otherCardMask;
                                document.getElementById("cardNumber").focus();
                            },
                            computed: {
                                getCardType() {
                                    let number = this.cardNumber;
                                    let re = new RegExp("^4");
                                    if (number.match(re) != null) return "visa";

                                    re = new RegExp("^(34|37)");
                                    if (number.match(re) != null) return "amex";

                                    re = new RegExp("^5[1-5]");
                                    if (number.match(re) != null) return "mastercard";

                                    re = new RegExp("^6011");
                                    if (number.match(re) != null) return "discover";

                                    re = new RegExp('^9792')
                                    if (number.match(re) != null) return 'troy'

                                    return "visa"; // default type
                                },
                                generateCardNumberMask() {
                                    return this.getCardType === "amex" ? this.amexCardMask : this.otherCardMask;
                                },
                                minCardMonth() {
                                    if (this.cardYear === this.minCardYear) return new Date().getMonth() + 1;
                                    return 1;
                                }
                            },
                            watch: {
                                cardYear() {
                                    if (this.cardMonth < this.minCardMonth) {
                                        this.cardMonth = "";
                                    }
                                }
                            },
                            methods: {
                                flipCard(status) {
                                    this.isCardFlipped = status;
                                },
                                focusInput(e) {
                                    this.isInputFocused = true;
                                    let targetRef = e.target.dataset.ref;
                                    let target = this.$refs[targetRef];
                                    this.focusElementStyle = {
                                        width: `${target.offsetWidth}px`,
                                        height: `${target.offsetHeight}px`,
                                        transform: `translateX(${target.offsetLeft}px) translateY(${target.offsetTop}px)`
                                    }
                                },
                                blurInput() {
                                    let vm = this;
                                    setTimeout(() => {
                                        if (!vm.isInputFocused) {
                                            vm.focusElementStyle = null;
                                        }
                                    }, 300);
                                    vm.isInputFocused = false;
                                }
                            }
                        });
                    </script>
                <? } ?>
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
                        <h6><a href="/user/edit" class="mt-15 plr-20 btn-b-sm btn-fill-primary dplay-block" type="submit"><b>Указать</b></a></h6>
                    </div>';
                            } ?></h4>
                    </div>
                    <div class="ptb-0">
                        <h4 class="mtb-20"><b>Реквизиты вашей карты:</b><? if ($cart != null) { ?>
                                <div><? echo mb_strimwidth($cart, 0, 4) . " **** **** ****"; ?></div> <? } else {
                                echo '                    
                        <div class="form-sm max-w-400x mlr-auto">
                        <h6><a href="/user/edit" class="mt-15 plr-20 btn-b-sm btn-fill-primary dplay-block" type="submit"><b>Указать</b></a></h6>
                    </div>';
                            } ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require_once(ROOT . '/views/header_and_footer/footer.php') ?>
