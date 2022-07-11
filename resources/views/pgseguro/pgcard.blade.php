<x-app-layout>
    <x-slot name="header">
        <p class="font-sans font-light text-xl text-gray-500">Suporte!</p>
   </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!----------inicio------>
                   <html>
                    <head>
                        <script src="https://www.mercadopago.com/v2/security.js" view="home"></script>
                        <script src="https://sdk.mercadopago.com/js/v2"></script>
                    </head>
                    <body>
                        <div id="cardPaymentBrick_container"></div>
                        <script>
                            const mp = new MercadoPago('APP_USR-1b511067-d106-48e9-ac4c-3b7fae2babbd', {locale: 'pt-BR',});
                            const bricksBuilder = mp.bricks();
                            const renderCardPaymentBrick = async (bricksBuilder) => {
                            const settings = {
                                customization: {
                                     paymentMethods: {
                                         minInstallments: 0,
                                         maxInstallments: 1,
                                     },
                                 },
                                    initialization: {
                                        amount: 37, //valor do processamento a ser realizado
                                        payer: {
                                        email: 'test_user_74104617@testuser.com',
                                    },
                                      },

                                    style: {
                                        theme: 'default' // | 'dark' | 'bootstrap' | 'flat'
                                    },
                                    callbacks: {
                                        onReady: () => {
                                        // callback chamado quando o Brick estiver pronto
                                        },
                                        onSubmit: (cardFormData) => {
                                        // callback chamado o usuário clicar no botão de submissão dos dados
                                        // ejemplo de envío de los datos recolectados por el Brick a su servidor
                                        return new Promise((resolve, reject) => {
                                            fetch("/pagamento", {
                                                method: "POST",
                                                headers: {
                                                    "Content-Type": "application/json",
                                                },
                                               body: JSON.stringify(cardFormData)


                                            })
                                            .then((response) => {
                                                return response.json();
                                                resolve();
                                            })

                                            .then(result => {
                                                if(!result.hasOwnProperty("error_message")) {
            document.getElementById("payment-id").innerText = result.id;
            document.getElementById("payment-status").innerText = result.status;
            document.getElementById("payment-detail").innerText = result.detail;
            $('.container__payment').fadeOut(500);
            setTimeout(() => { $('.container__result').show(500).fadeIn(); }, 500);
        } else {
            alert(JSON.stringify({
                status: result.status,
                message: result.error_message
            }))
        }

                                          })


                                            .catch((error) => {
                                                // lidar com a resposta de erro ao tentar criar o pagamento
                                                reject();
                                            })
                                            });
                                        },
                                        onError: (error) => {
                                        // callback chamado para todos os casos de erro do Brick
                                        },
                                    },
                                };
                                window.cardPaymentBrickController = await bricksBuilder.create('cardPayment', 'cardPaymentBrick_container', settings);
                            };
                            renderCardPaymentBrick(bricksBuilder);
                        </script>
                    </body>
                </html>

                   <!-----------fim-------->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

