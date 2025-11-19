@props(['config'])

{{-- NIP --}}
<script type="module">
    $(document).ready(function() {
        const config = @json($config);

        // Otomatisasi Input Berdasarkan NIP
        $('#nip').on('input', function() {
            let val = $(this).val().replace(/\D/g, '');

            let formatted = '';
            if (val.length > 0) formatted += val.slice(0, 8);
            if (val.length > 8) formatted += ' ' + val.slice(8, 14);
            if (val.length > 14) formatted += ' ' + val.slice(14, 15);
            if (val.length > 15) formatted += ' ' + val.slice(15, 18);
            $(this).val(formatted);

            if (val.length >= 18) {
                const tahun = val.slice(0, 4);
                const bulan = val.slice(4, 6);
                const tanggal = val.slice(6, 8);
                const tanggalLahir = `${tahun}-${bulan}-${tanggal}`;
                $('#tgllahir').val(tanggalLahir);

                const jkDigit = val.slice(14, 15);
                let jenisKelamin = '';
                if (jkDigit === '1') jenisKelamin = 'L';
                else if (jkDigit === '2') jenisKelamin = 'P';
                else jenisKelamin = '';
                $('#jnskel').val(jenisKelamin);
            } else {
                $('#tgllahir').val('');
                $('#jnskel').val('');
            }
        });

        // Select 2 
        $('.select2').select2({
            dropdownCssClass: "text-xs",
            selectionCssClass: 'text-xs',
        });

        // Functoin Validation Error
        function showToastError(message) {
            console.log(message);

            const toastId = 'toast-' + Date.now();
            $('#toast-danger').remove();

            $('#toastAlert').append(
                `<div id="${toastId}" 
                    class="flex items-center w-full max-w-sm px-4 py-2 text-body bg-red-200 rounded-lg shadow-xs border border-red-700 mt-2"
                    role="alert">
                        <div class="text-sm text-red-700">
                            ${message}
                        </div>
                        <button type="button"
                            class="ms-auto flex items-center justify-center text-body bg-transparent border border-transparent font-medium rounded text-sm h-8 w-8 focus:outline-none"
                            data-dismiss-target="#${toastId}" aria-label="Close">
                                <i class="fa-solid fa-x text-red-700"></i>
                        </button>
                </div>`
            );
            setTimeout(() => {
                $(`#${toastId}`).fadeOut(300, function() {
                    $(this).remove();
                });
            }, 3000);
        }
        $('#buttonNext').on('click', function(event) {
            if ($('#nip').val() == null || $('#nip').val() == '') {
                showToastError("NIP tidak boleh kosong.");
                $('#nip').focus();
                return;
            }

            if ($('#nama').val() == null || $('#nama').val() == '') {
                showToastError("Nama Lengkap tidak boleh kosong.");
                $('#nama').focus();
                return;
            }

            if ($('#kelahiran').val() == null || $('#kelahiran').val() == '') {
                showToastError("Tempat Kelahiran tidak boleh kosong.");
                $('#kelahiran').focus();
                return;
            }

            if ($('#tgllahir').val() == null || $('#tgllahir').val() == '') {
                showToastError("Tanggal Lahir tidak boleh kosong.");
                $('#tgllahir').focus();
                return;
            }

            if ($('#usiapens').val() == null || $('#usiapens').val() == '') {
                showToastError("Usia Pensiun tidak boleh kosong.");
                $('#usiapens').focus();
                return;
            }
            if ($('#jnskel').val() == null || $('#jnskel').val() == '') {
                showToastError("Harap Pilih Jenis Kelamin Terlebih Dahulu.");
                $('#jnskel').focus();
                return;
            }

            if ($('#agama').val() == null || $('#agama').val() == '') {
                showToastError("Harap Pilih Agama Terlebih Dahulu.");
                $('#agama').focus();
                return;
            }

            if ($('#pdidik').val() == null || $('#pdidik').val() == '') {
                showToastError("Harap Pilih Pendidikan Terakhir Terlebih Dahulu.");
                $('#pdidik').focus();
                return;
            }

            if ($('#asalpeg').val() == null || $('#asalpeg').val() == '') {
                showToastError("Harap Pilih Asal Pegawai Terlebih Dahulu.");
                $('#asalpeg').focus();
                return;
            }

            $('#gaji-tab').click();
        });

        $(document).on('click', '[data-dismiss-target]', function() {
            const target = $(this).data('dismiss-target');
            $(target).remove();
        });
        $('#formSubmit').on('submit', function(event) {
            event.preventDefault();
            console.log('test');

            if ($('#jnspeg').val() == null || $('#jnspeg').val() == '') {
                showToastError("Harap Pilih Jenis Pegawai Terlebih Dahulu.");
                console.log('test2');

                $('#jnspeg').focus();
                return;
            }

            if ($('#sk_tanggal').val() == null || $('#sk_tanggal').val() == '') {
                showToastError("SK Tanggal Tidak Boleh Kosong.");
                $('#sk_tanggal').focus();
                return;
            }

            if ($('#sk_tmt').val() == null || $('#sk_tmt').val() == '') {
                showToastError("TMT. SK Tidak Boleh Kosong.");
                $('#sk_tmt').focus();
                return;
            }

            if ($('#sk_nomor').val() == null || $('#sk_nomor').val() == '') {
                showToastError("SK Nomor Tidak Boleh Kosong.");
                $('#sk_nomor').focus();
                return;
            }

            if ($('#sk_dari').val() == null || $('#sk_dari').val() == '') {
                showToastError("SK Dari Tidak Boleh Kosong.");
                $('#sk_dari').focus();
                return;
            }

            if ($('#kdgol').val() == null || $('#kdgol').val() == '') {
                showToastError("Harap Pilih Golongan Terlebih Dahulu.");
                $('#kdgol').focus();
                return;
            }

            if ($('#masa').val() == null || $('#masa').val() == '') {
                showToastError("Harap Pilih Masa Kerja Terlebih Dahulu.");
                $('#masa').focus();
                return;
            }

            if ($('#jnsjab').val() == null || $('#jnsjab').val() == '') {
                showToastError("Harap Pilih Jenis Jabatan Terlebih Dahulu.");
                $('#jnsjab').focus();
                return;
            }


            if ($('#jnsjab').val().trim() !== '') {
                if (Number($('#jnsjab').val()) == 1) {
                    if ($('#kdstruk').val() == null || $('#kdstruk').val() == '') {
                        showToastError("Harap Pilih Jabatan Struktural Terlebih Dahulu.");
                        $('#kdstruk').focus();
                        return;
                    }
                } else if (Number($('#jnsjab').val()) == 2) {
                    if ($('#kelfung').val() == null || $('#kelfung').val() == '') {
                        showToastError("Harap Pilih Kelompok Fungsional Terlebih Dahulu.");
                        $('#kelfung').focus();
                        return;
                    } else {
                        if ($('#kdfung').val() == null || $('#kdfung').val() == '') {
                            showToastError("Harap Pilih Jabatan Fungsional Terlebih Dahulu.");
                            $('#kdfung').focus();
                            return;
                        }
                    }
                }
            }

            if ($('#kdskpd').val() == null || $('#kdskpd').val() == '') {
                showToastError("Harap Pilih Unit Kerja Terlebih Dahulu.");
                $('#kdskpd').focus();
                return;
            }



            this.submit();
        })

        // Get Golongan
        $('#jnspeg').on('change', function() {
            const jnspeg_id = $(this).val();
            $('#masa').val(null)

            if (jnspeg_id) {
                $.ajax({
                    url: "{{ route('get.pangkat.by.jenis-pegawai') }}",
                    type: "GET",
                    data: {
                        jenis_pegawai_id: jnspeg_id
                    },
                    success: function(response) {
                        $('#kdgol').empty();
                        $('#kdgol').append(
                            '<option value="" selected disabled>Pilih Golongan</option>'
                        );
                        $('#masa').empty();
                        $('#masa').append(
                            '<option value="" selected disabled>Pilih Masa Kerja</option>'
                        );

                        if (response.length > 0) {
                            $.each(response, function(index, data) {
                                $('#kdgol').append('<option value="' +
                                    data.kdgol + '">' + data.kdgol +
                                    ' - ' + data
                                    .uraian +
                                    '</option>');
                            });
                        } else {
                            $('#kdgol').append(
                                '<option value="" disabled>Tidak ada Golongan tersedia</option>'
                            );
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#kdgol').empty();
                $('#kdgol').append(
                    '<option value="" selected disabled>Pilih Golongan</option>'
                );

                $('#masa').empty();
                $('#masa').append(
                    '<option value="" selected disabled>Pilih Masa Kerja</option>'
                );
            }
        });

        // Get Masa
        $('#kdgol').on('change', function() {
            const kdgol = $(this).val();
            const jnspeg_id = $('#jnspeg').val();

            if (kdgol) {
                $.ajax({
                    url: "{{ route('get.masa.by.kode-golongan') }}",
                    type: "GET",
                    data: {
                        kode_golongan: kdgol,
                        jenis_pegawai_id: jnspeg_id
                    },
                    success: function(response) {
                        $('#masa').empty();
                        $('#masa').append(
                            '<option value="" selected disabled>Pilih Masa Kerja</option>'
                        );

                        $('#jnsjab').val('');

                        $('#kelfung').val('');

                        $('#kdfung').empty();
                        $('#kdfung').append(
                            '<option value="" selected disabled>Pilih Jabatan Fungsional</option>'
                        );
                        $('#sertguru').empty();
                        $('#sertguru').append(
                            '<option value="" selected disabled>Pilih Sertifikasi Guru</option>'
                        );

                        if (response.length > 0) {
                            $.each(response, function(index, data) {
                                let rupiah = new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                    minimumFractionDigits: 0
                                }).format(data.rp_pokok);
                                $('#masa').append('<option data-rp="' + data
                                    .rp_pokok + '" value="' +
                                    data.masa + '">' + data.masa + ' Tahun - ' +
                                    rupiah +
                                    '</option>');
                            });
                        } else {
                            $('#masa').append(
                                '<option value="" disabled>Tidak ada Masa tersedia</option>'
                            );
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#masa').empty();
                $('#masa').append(
                    '<option value="" selected disabled>Pilih Masa Kerja</option>'
                );
            }
        });

        // Jenis Jabatan
        $('#jnsjab').on('change', function() {
            const jnsjab = $(this).val();

            // Reset semua elemen terlebih dahulu
            function resetElement(selector) {
                $(selector).prop('disabled', true)
                    .prop('required', false)
                    .val(null);
            }

            resetElement('#kdstruk');
            $('#kdstruk').empty();
            $('#kdstruk').append(
                '<option value="" selected disabled>Pilih Jabatan Struktural</option>'
            );

            resetElement('#kelfung');
            $('#kelfung').empty();
            $('#kelfung').append(
                '<option value="" selected disabled>Pilih Kelompok Fungsional</option>'
            );

            resetElement('#kdfung');
            $('#kdfung').empty();
            $('#kdfung').append(
                '<option value="" selected disabled>Pilih Jabatan Fungsional</option>'
            );

            resetElement('#sertguru');
            $('#sertguru').empty();
            $('#sertguru').append(
                '<option value="" selected disabled>Pilih Sertifikasi Guru</option>'
            );

            if (!jnsjab) return;

            if (jnsjab == '1') {
                $('#kdstruk').prop('disabled', false).prop('required', false);

                $.ajax({
                    url: "{{ route('get.struktural') }}",
                    type: "GET",
                    success: function(response) {
                        $('#kdstruk').empty()
                        $('#kdstruk').append(
                            '<option value="" selected disabled>Pilih Jabatan Struktural</option>'
                        );
                        if (response.length > 0) {
                            $.each(response, function(index, data) {
                                let rupiah = new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                    minimumFractionDigits: 0
                                }).format(data.rp_struk);
                                $('#kdstruk').append(
                                    `<option data-rp="${data.rp_struk}" value="${data.kdstruk}">${data.uraian} - ${rupiah}</option>`
                                );
                            });
                        } else {
                            $('#kdstruk').append(
                                '<option value="" disabled>Tidak ada Jabatan Struktural</option>'
                            );
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });

            } else if (jnsjab == '2') { // Jabatan Fungsional
                $('#kelfung, #kdfung').prop('disabled', false).prop('required', false);
                $('#sertguru').prop('disabled', false).prop('required', false);

                // Kelompok Fungsional
                $.ajax({
                    url: "{{ route('get.kelompok-fungsional') }}",
                    type: "GET",
                    success: function(response) {
                        $('#kelfung').empty()
                        $('#kelfung').append(
                            '<option value="" selected disabled>Pilih Kelompok Fungsional</option>'
                        );
                        if (response.length > 0) {
                            $.each(response, function(i, data) {
                                $('#kelfung').append(
                                    `<option value="${data.kdkel}">${data.uraian}</option>`
                                );
                            });
                        } else {
                            $('#kelfung').append(
                                '<option value="" disabled>Tidak ada Kelompok Fungsional</option>'
                            );
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });

                // Sertifikasi Guru
                $.ajax({
                    url: "{{ route('get.sertifikasi') }}",
                    type: "GET",
                    success: function(response) {
                        $('#sertguru').empty()
                        $('#sertguru').append(
                            '<option value="" selected disabled>Pilih Sertifikasi Guru</option>'
                        );
                        if (response.length > 0) {
                            $.each(response, function(i, data) {
                                $('#sertguru').append(
                                    `<option value="${data.kode}">${data.uraian}</option>`
                                );
                            });
                        } else {
                            $('#sertguru').append(
                                '<option value="" disabled>Tidak ada Sertifikasi Guru</option>'
                            );
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        // Get Jabatan Fungsional
        $('#kelfung').on('change', function() {
            const kelfung = $(this).val();
            const kdgol = $('#kdgol').val();
            if (kelfung) {
                $.ajax({
                    url: "{{ route('get.jabatan-fungsional.by.kelompok-fungsional') }}",
                    type: "GET",
                    data: {
                        kelompok_fungsional: kelfung,
                        kode_golongan: kdgol
                    },
                    success: function(response) {
                        $('#kdfung').empty();
                        $('#kdfung').append(
                            '<option value="" selected disabled>Pilih Jabatan Fungsional</option>'
                        );

                        if (response.length > 0) {
                            $.each(response, function(index, data) {
                                let rupiah = new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                    minimumFractionDigits: 0
                                }).format(data.rp_fung);
                                $('#kdfung').append('<option data-rp="' + data
                                    .rp_fung + '" value="' +
                                    data.kdfung + '">' + data.uraian + ' - ' +
                                    rupiah +
                                    '</option>');
                            });
                        } else {
                            $('#kdfung').append(
                                '<option value="" disabled>Tidak ada Jabatan Fungsional Tersedia</option>'
                            );
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#kdfung').empty();
                $('#kdfung').append(
                    '<option value="" selected disabled>Pilih Jabatan Fungsional</option>'
                );
            }
        });

        $('.rupiah').on('focus', function() {
            let value = $(this).val().replace(/[^0-9]/g, '');
            $(this).val(value);
        });

        $('.rupiah').on('blur', function() {
            let value = $(this).val().replace(/[^0-9]/g, '');
            $(this).val(formatRupiah(value));
        });

        function formatRupiah(angka) {
            if (!angka) return 'Rp. 0';
            let number_string = angka.toString().replace(/[^,\d]/g, '');
            let split = number_string.split(',');
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return 'Rp. ' + rupiah;
        }

        $(document).ready(function() {
            $('.rupiah').each(function() {
                let value = $(this).val();
                $(this).val(formatRupiah(value));
            });
        });

        // Perhitungan Gaji
        function hitungGaji() {

            // Get Status
            const inputAnak = $('#anak').val()
            const inputKawin = $('#kawin').val()
            const inputStatus = $('#status').val()
            let anak1;
            let anak2;
            let status;

            if (inputAnak >= 3) {
                anak1 = 2;
                anak2 = 3;
            } else {
                anak1 = inputAnak;
                anak2 = inputAnak;
            }

            if (inputKawin == 'TK') {
                status = 'TK1000'
            } else if (inputKawin == 'K1' || inputKawin == 'K3') {
                if (inputAnak >= 3) {
                    status = 'K 1103'
                } else {
                    status = 'K 110' + anak1
                }
            } else if (inputKawin == 'K2') {
                status = 'K 1000'
            } else if (inputKawin == 'D' || inputKawin == 'J') {
                if (inputAnak >= 3) {
                    status = 'K 1003'
                } else {
                    status = 'K 100' + anak1
                }
            }

            // Get Gaji Pokok
            let gaji_pokok;
            let gaji_pokok_persen;
            let gaji_pokok_masa;
            if ($('#jnspeg').val() !== null && $('#masa').val() !== null) {
                gaji_pokok = 0;
                gaji_pokok_persen = 0;
                gaji_pokok_masa = 0;

                gaji_pokok_persen = $('#jnspeg').val() == '2' ? 80 : 100;
                gaji_pokok_masa = $('#masa option:selected').data('rp');

                gaji_pokok = gaji_pokok_masa * gaji_pokok_persen / 100;
                $('#gaji_pokok').val(formatRupiah(gaji_pokok))
            } else {
                gaji_pokok = 0;
                $('#gaji_pokok').val(formatRupiah(gaji_pokok))
            }

            // Get Tunjangan Istri/Suami
            let tunjangan_istri_suami;
            if (gaji_pokok && gaji_pokok !== 0) {
                tunjangan_istri_suami = config.tj_istri / 100 * gaji_pokok;
                $('#istri_suami').val(formatRupiah(tunjangan_istri_suami))
            } else {
                tunjangan_istri_suami = 0;
                $('#istri_suami').val(formatRupiah(tunjangan_istri_suami))
            }

            // Get Tunjangan Anak
            let tunjangan_anak;
            if (gaji_pokok && gaji_pokok !== 0) {
                tunjangan_anak = config.tj_anak / 100 * gaji_pokok * anak1;
                $('#tunjangan_anak').val(formatRupiah(tunjangan_anak));
            } else {
                tunjangan_anak = 0;
                $('#tunjangan_anak').val(formatRupiah(tunjangan_anak));
            }

            // Get Tunjangan Struktural 
            let tunjangan_struktural;
            if ($('#kdstruk').val() !== null) {
                tunjangan_struktural = $('#kdstruk option:selected').data('rp');

                $('#tunjangan_struktural').val(formatRupiah(tunjangan_struktural));
            } else {
                tunjangan_struktural = 0;
                $('#tunjangan_struktural').val(formatRupiah(tunjangan_struktural));
            }

            // Get Tunjangan Fungsional
            let tunjangan_fungsional;
            if ($('#kdfung').val() !== null) {
                tunjangan_fungsional = $('#kdfung option:selected').data('rp');

                $('#tunjangan_fungsional').val(formatRupiah(tunjangan_fungsional));
            } else {
                tunjangan_fungsional = 0;
                $('#tunjangan_fungsional').val(formatRupiah(tunjangan_fungsional));
            }

            // Get Tunjangan Umum
            let golongan_tunjangan_umum;
            let tunjangan_umum
            if ($('#jnspeg').val() !== null && $('#kdgol').val() !== null) {
                const jenis_pegawai = $('#jnspeg').val() == '1' || $('#jnspeg').val() == '2' ? 1 : 2;
                const kode_golongan = $('#kdgol').val();
                if (jenis_pegawai == 1) {
                    if (kode_golongan.startsWith('I/')) {
                        golongan_tunjangan_umum = 1;
                    } else if (kode_golongan.startsWith('II/')) {
                        golongan_tunjangan_umum = 2;
                    } else if (kode_golongan.startsWith('III/')) {
                        golongan_tunjangan_umum = 3;
                    } else if (kode_golongan.startsWith('IV/')) {
                        golongan_tunjangan_umum = 4;
                    }
                } else if (jenis_pegawai == 2) {
                    if (Number(kode_golongan) <= 4) {
                        golongan_tunjangan_umum = 1
                    } else if (Number(kode_golongan) >= 5 && Number(kode_golongan) <= 8) {
                        golongan_tunjangan_umum = 2
                    } else if (Number(kode_golongan) >= 9 && Number(kode_golongan) <= 12) {
                        golongan_tunjangan_umum = 3
                    } else {
                        golongan_tunjangan_umum = 4
                    }
                }

                if (golongan_tunjangan_umum == 1) {
                    tunjangan_umum = config.tj_umum1
                } else if (golongan_tunjangan_umum == 2) {
                    tunjangan_umum = config.tj_umum2
                } else if (golongan_tunjangan_umum == 3) {
                    tunjangan_umum = config.tj_umum3
                } else if (golongan_tunjangan_umum == 4) {
                    tunjangan_umum = config.tj_umum4
                } else {
                    tunjangan_umum = 0
                }
                $('#tunjangan_umum').val(formatRupiah(tunjangan_umum))
            } else {
                tunjangan_umum = 0;
                $('#tunjangan_umum').val(formatRupiah(tunjangan_umum))
            }

            // Get Tunjangan Beras
            let tunjangan_beras;
            if (inputKawin == 'K3') {
                tunjangan_beras = 0
                $('#tunjangan_beras').val(formatRupiah(tunjangan_beras))
            } else {
                tunjangan_beras = config.kg_beras * config.rp_beras * (1 + status.substr(4, 1) + anak1)
                $('#tunjangan_beras').val(formatRupiah(tunjangan_beras))
            }

            // Get Penghasilan
            let total_penghasilan = gaji_pokok + tunjangan_istri_suami + tunjangan_anak + tunjangan_struktural +
                tunjangan_fungsional + tunjangan_umum + tunjangan_beras
            $('#penghasilan').val(formatRupiah(total_penghasilan))

        }
        $('#masa, #jnspeg, #kdstruk, #kelfung ,#kdfung, #jnsjab, #kdgol').on('change', function() {
            hitungGaji()
        })

        hitungGaji()
    });
</script>
