<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if (session('status'))
                        <div class="notification">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    

                        <h5>Hvala na porudžbini!</h5>
                        <br>
                        <p>
                            Metod plaćanja:  NBS IPS QR kod
                        </p>
                        <p>
                            <form id="generator">
                                <input type="hidden" id="k" name="k" value="PR">
                                <input type="hidden" name="v" value="01">
                                <input type="hidden" name="c" value="1">

                                <input type="hidden" id="n" name="n" required="" value="{{ $settings->company }}">

                                <input type="hidden" id="r" name="r" pattern="[0-9]{18}" required="" value="{{ $settings->account }}">

                                <input type="hidden" id="i" name="i" pattern="[A-Z]{3}[0-9]+,[0-9]{2}" value="RSD{{ number_format((float)$book->price, 2, ',', '') }}" required="">

                                <input type="hidden" id="sf" name="sf" pattern="[1239][0-9]{2}" placeholder="121" value="121">

                                <input type="hidden" id="s" name="s" value="Uplata po fakturi">

                                <input type="hidden" id="ro" name="ro">

                                <label for="p">Naziv platioca</label>
                                <input type="text" id="p" name="p" value="{{ $to_name }}">

                                <input type="hidden" id="o" name="o" placeholder="123000000000000012" pattern="[0-9]{18}" required="">


                                <input type="submit" class="btn btn-primary" value="Generiši QR Kod">
                                <canvas id="output"></canvas>
                            </form>
                        </p>
                </div>
                <script src="{{ asset('js/qrcode.min.js') }}"></script>
                <script src="{{ asset('js/main.js') }}"></script>
                <script>
                    var output = document.getElementById('output');
                    document.getElementById('generator').addEventListener('submit', e => {
                        e.preventDefault();
                        e.stopPropagation();
                        var formData = new FormData(e.target);
                        var data = {};
                        formData.forEach((value, key) => {
                            if (value !== "") data[key] = value;
                        });
                        var { width, height, margin, scale, fg:dark, bg:light, ...qrCodeParams } = data;
                        var options = { width, height, margin, color: { light, dark } };
                        IpsQrCode(qrCodeParams)
                            .then(ipsString => {
                                console.log(`Sadržaj QR koda je: '${ipsString}'`);
                                QRCode.toCanvas(output, ipsString, options);
                                console.log(QRCode);
                            })
                            .catch(error => console.error(error));
                        return false;
                    });
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
