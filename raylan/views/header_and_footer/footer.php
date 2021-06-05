
<footer class="bg-191 pos-relative color-ccc bg-footer pt-50">
    <div class="abs-tblr pt-50 z--1 text-center">
        <div class="h-80 pos-relative"><div class="bg-map abs-tblr opacty-1"></div></div>
    </div>

    <div class="container">

        <div class="mt-20 brdr-ash-1 opacty-4"></div>

        <div class="text-center ptb-30">
            <div class="row">
                <div class="site-logo">
                    <img class="logo" src="/template/img/logo.png">
                    <a href="/" class="p-2">
                        <h3 class="text-center">СНТ "Дружба"</h3>
                    </a>
                </div>

                <div class="col-sm-5">
                    <p class="mtb-10">Какая то надпись в конце</p>
                </div><!-- col-sm-3 -->

                <div class="col-sm-4">
                    <ul class="mtb-10 font-12 list-radial-35 list-li-mlr-3">
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                        <li><a href="#"><i class="ion-social-google"></i></a></li>
                        <li><a href="#"><i class="ion-social-rss"></i></a></li>
                    </ul>
                </div><!-- col-sm-3 -->
            </div><!-- row -->
        </div><!-- text-center -->
    </div><!-- container -->
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/vue-the-mask@0.11.1/dist/vue-the-mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
<script>
    new Vue({
        el: "#app",
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
</body>
</html>