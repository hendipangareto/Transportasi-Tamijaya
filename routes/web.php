<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\MasterData\Service;
use App\Models\MasterData\Facility;
use App\Models\MasterData\Office;
use App\Models\MasterData\Bus;


#region CLIENT
Route::group(
    ['namespace' => 'Client'],
    function () {
        #Page
        Route::get('/', 'PageController@index')->name('home');
        Route::get('/travel', function () {
            $facilities = Facility::get();
            $offices = Office::get();
            return view('client.pages.travel.index', ['facilities' => $facilities, 'offices' => $offices]);
        })->name('travel');
        Route::get('/armada', function () {
            $facilities = Facility::get();
            $buses = Bus::get();
            return view('client.pages.armada.index', ['facilities' => $facilities, 'buses' => $buses]);
        })->name('armada');
        Route::get('/about', function () {
            $services = Service::get();
            return view('client.pages.about.index', ['services' => $services]);
        })->name('about');
        Route::get('/support', function () {
            $offices = Office::get();
            return view('client.pages.contact.support', ['offices' => $offices]);
        })->name('support');
        Route::get('/faq', function () {
            return view('client.pages.contact.faq');
        })->name('faq');
        Route::get('/coming-soon', function () {
            return view('client.pages.coming-soon');
        })->name('coming-soon');
        Route::get('/booking-ticket', function () {
            return view('client.booking.ticket.index');
        })->name('booking-ticket');


        #EndPage

        // Dashboard
        Route::get('/account/info', function () {
            return view('client.dashboard.pages.info');
        })->name('information');

        Route::get('/account/general', function () {
            return view('client.dashboard.pages.general');
        })->name('general');

        Route::get('/account/account-password', function () {
            return view('client.dashboard.pages.account-password');
        })->name('account-password');

        Route::get('/account/transaction', function () {
            return view('client.dashboard.pages.transaction');
        })->name('transaction');

        Route::get('/account/inbox', function () {
            return view('client.dashboard.pages.inbox');
        })->name('inbox');


        // Functional
        // Reservation
        Route::get('/master-data/bank/get-data-by-id/{id}', 'MasterData\MainMasterDataController@getBankById');
        Route::post('/reservation/reguler/check-schedule-reguler', 'Reservation\BookingReservationController@getScheduleReguler');
        Route::post('/reservation/reguler/pick-seat-reguler', 'Reservation\BookingReservationController@getSeatReguler');


        // Customer
        Route::post('/customer/login', 'Customer\AuthController@loginCustomer');
        Route::post('/customer/register', 'Customer\AuthController@registerCustomer');
        Route::post('/customer/confirmation-otp', 'Customer\AuthController@confrimationOtp');
        Route::post('/customer/create-password', 'Customer\AuthController@createPassword');
    }

// Re Function Client

);
#endregion

#region FUNCTION
// Open Function
Route::get('admin/master-data/pick-point/get-pick-by-destination/{code}', 'Admin\MasterData\PickPointController@getPickByDestination');
Route::get('send-email', 'MailController@sendEmail');
Route::get('helper', 'HomeController@testCreateJournal');
#endregion

#region ADMIN
Auth::routes();
Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin'],
    function () {
        #region Authentication
        Route::get(
            '/login',
            function () {
                $app_env = env("APP_ENV");
                $target_url = '';
                if ($app_env == 'local') {
                    $target_url = 'Location: http://127.0.0.1:8000/admin/dashboard';
                } else if ($app_env == 'development') {
                    $target_url = 'Location: https://tamijaya-utama/admin/dashboard';
                } else if ($app_env == 'production') {
                    $target_url = 'Location: https://tamijaya-utama/admin/dashboard';
                }
                if (Auth::user()) {
                    header($target_url);
                    exit;
                }
                return view('admin.auth.login');
            }
        )->name('admin.login');
        #endregion
        #endregion
        Route::middleware(['auth'])->group(function () {

            //MARKETING TICKETING OFFICE
            Route::prefix('marketing-ticketing')->group(function () {
                Route::prefix('pemandu-perjalanan')->group(function () {
                    Route::prefix('perjalanan-bus-reguler')->group(function () {
                        Route::get('/', 'MarketingTicketing\PemanduPerjalanan\PerjalananBusRegulerController@index')->name('marketing-ticketing-pemandu-perjalanan-perjalanan-bus-reguler-index');
                    });
                    Route::prefix('checklist-penumpang')->group(function () {
                        Route::prefix('executive')->group(function () {
                            Route::get('/', 'MarketingTicketing\PemanduPerjalanan\ChecklistPenumpang\ExecutiveController@index')->name('marketing-ticketing-checklist-penumpang-executive-index');
                        });
                        Route::prefix('suites')->group(function () {
                            Route::get('/', 'MarketingTicketing\PemanduPerjalanan\ChecklistPenumpang\SuitesController@index')->name('marketing-ticketing-checklist-penumpang-suites-index');
                        });
                    });
                    Route::prefix('laporan')->group(function () {
                        Route::prefix('rekap-laporan-dana')->group(function () {
                            Route::get('/', 'MarketingTicketing\PemanduPerjalanan\Laporan\RekapLaporanDanaController@index')->name('marketing-ticketing-laporan-rekap-laporan-dana-index');
                        });
                        Route::prefix('laporan-dana')->group(function () {
                            Route::get('/', 'MarketingTicketing\PemanduPerjalanan\Laporan\LaporanDanaController@index')->name('marketing-ticketing-laporan-laporan-dana-index');
                        });
                    });
                });
                Route::prefix('petugas-penagihan')->group(function () {
                    Route::prefix('transaction-agent')->group(function () {
                        Route::get('/', 'MarketingTicketing\PetugasPenagihan\TransactionAgentController@index')->name('marketing-ticketing-petugas-penagihan-transaction-index');
                    });
                    Route::prefix('tagihan-agent')->group(function () {
                        Route::get('/', 'MarketingTicketing\PetugasPenagihan\TagihanAgentController@index')->name('marketing-ticketing-petugas-penagihan-tagihan-agent-index');
                        Route::get('/hutang-agent', 'MarketingTicketing\PetugasPenagihan\TagihanAgentController@hutangAgent')->name('marketing-ticketing-petugas-penagihan-tagihan-agent-hutang-agent');
                    });
                    Route::prefix('laporan')->group(function () {
                        Route::get('/', 'MarketingTicketing\PetugasPenagihan\LaporanAgentController@index')->name('marketing-ticketing-petugas-penagihan-laporan-index');
                    });
                });

            });

            //PERAWATAN & PEMELIHARAAN
            Route::prefix('perawatan-pemeliharaan')->group(function () {
                Route::prefix('sopir')->group(function () {
                    Route::get('/check-fisik-layanan', 'PerawatanPemeliharaan\Sopir\CekFisikLayananController@listCheckFisik')->name('perawatan-pemeliharaan.sopir.check-fisik-layanan');
                    Route::get('/get-armada', 'PerawatanPemeliharaan\Sopir\CekFisikLayananController@getArmada')->name('perawatan-pemeliharaan.sopir.get-armada');
                    Route::post('/check-fisik-layanan/tambah', 'PerawatanPemeliharaan\Sopir\CekFisikLayananController@TambahArmada')->name('perawatan-pemeliharaan.sopir.check-fisik-layanan.tambah');
                    Route::post('/check-fisik-layanan/ajukan', 'PerawatanPemeliharaan\Sopir\CekFisikLayananController@AjukanCuciArmada')->name('perawatan-pemeliharaan.sopir.check-fisik-layanan.ajukan');

                    Route::post('/simpan-check-fisik-layanan', 'PerawatanPemeliharaan\Sopir\CekFisikLayananController@SumpanCheckList')->name('perawatan-pemeliharaan.sopir.simpan-check-fisik-layanan');
                    Route::get('/report-perjalanan', 'PerawatanPemeliharaan\CekFisikLayananController@ReportPerjalanan')->name('perawatan-pemeliharaan.sopir.report-perjalanan');

//                    ===========

                });

                Route::prefix('petugas-cuci')->group(function () {
                    Route::get('/list-notifikasi-cuci', 'PerawatanPemeliharaan\PetugasCuci\CuciArmadaController@listNotifikasi')->name('perawatan-pemeliharaan.petugas-cuci.list-notifikasi-cuci');
                    Route::get('/list-form-cuci', 'PerawatanPemeliharaan\PetugasCuci\CuciArmadaController@FormCuci')->name('perawatan-pemeliharaan.petugas-cuci.list-form-cuci');

                    Route::get('/setujui-cuci-check-fisik-layanan/{id}', 'PerawatanPemeliharaan\PetugasCuci\CuciArmadaController@setujuiCuci')
                        ->name('perawatan-pemeliharaan.petugas-cuci.setujui-cuci-check-fisik-layanan');

                    Route::get('/tolak-cuci-check-fisik-layanan/{id}', 'PerawatanPemeliharaan\PetugasCuci\CuciArmadaController@TolakCuci')
                        ->name('perawatan-pemeliharaan.petugas-cuci.tolak-cuci-check-fisik-layanan');


                });

                Route::prefix('supervisor-cuci-mobil')->group(function () {
                    Route::get('/list-approval-laporan', 'PerawatanPemeliharaan\SupervisorCuciController@listApproval')->name('perawatan-pemeliharaan.supervisor-cuci-mobil.list-approval-laporan');
                    Route::get('/report-cuci-mobil', 'PerawatanPemeliharaan\SupervisorCuciController@ReportCuci')->name('perawatan-pemeliharaan.supervisor-cuci-mobil.report-cuci-mobil');
                });

                Route::prefix('check-rutin-armada')->group(function () {
                    Route::get('/list-check-armada', 'PerawatanPemeliharaan\CheckRutinController@listCheckArmada')->name('perawatan-pemeliharaan.check-rutin-armada.list-check-armada');
                });

                Route::prefix('supervisor-check-armada')->group(function () {
                    Route::get('/list-approval-sparepart', 'PerawatanPemeliharaan\SupervisorCheckArmadaController@listApprovalSparepart')->name('perawatan-pemeliharaan.supervisor-check-armada.list-approval-sparepart');
                    Route::get('/list-approval-logistik-perjalanan', 'PerawatanPemeliharaan\SupervisorCheckArmadaController@listApprovalLogistik')->name('perawatan-pemeliharaan.supervisor-check-armada.list-approval-logistik-perjalanan');
                    Route::get('/list-penentuan-bengkel', 'PerawatanPemeliharaan\SupervisorCheckArmadaController@listPenentuanBengkel')->name('perawatan-pemeliharaan.supervisor-check-armada.list-penentuan-bengkel');
                });

                Route::prefix('bengkel-dalam')->group(function () {
                    Route::get('/list-bengkel-dalam', 'PerawatanPemeliharaan\BengkelDalam\BengkelDalamController@listBengkelDalam')->name('perawatan-pemeliharaan.bengkel-dalam.list-bengkel-dalam');
                    Route::get('/checklist-perbaikan-bengkel', 'PerawatanPemeliharaan\BengkelDalam\CheckListPerbaikanController@checklistPerbaikan')->name('perawatan-pemeliharaan.bengkel-dalam.checklist-perbaikan-bengkel');
                    Route::get('/list-pengajuan-logistik-dalam', 'PerawatanPemeliharaan\BengkelDalam\PengajuanLogistikController@PengajuanLogistikDalam')->name('perawatan-pemeliharaan.bengkel-dalam.list-pengajuan-logistik');

                });

                Route::prefix('bengkel-luar')->group(function () {
                    Route::get('/list-bengkel-luar', 'PerawatanPemeliharaan\BengkelLuar\BengkelLuarController@listBengkelLuar')->name('perawatan-pemeliharaan.bengkel-dalam.list-bengkel-luar');
                    Route::get('/checklist-perbaikan-bengkel-luar', 'PerawatanPemeliharaan\BengkelLuar\CheckListPerbaikanController@checklistPerbaikan')->name('perawatan-pemeliharaan.bengkel-luar.checklist-perbaikan-bengkel-luar');
                    Route::get('/laporan-perbaikan-bengkel-luar', 'PerawatanPemeliharaan\BengkelLuar\LaporanPerbaikanController@LaporanPerbaikan')->name('perawatan-pemeliharaan.bengkel-luar.laporan-perbaikan-bengkel-luar');

                });

            });
            // PARIWISATA JADWAL


//            Route::resource('transaction/pariwisata/schedule-pariwisata', 'Transaction\Pariwisata\SchedulePariwisataController');

            //DATA EMPLOYEE
            Route::prefix('human-resource')->group(function () {
                Route::get('/master-employee-list-data', 'HumanResource\EmployeeController@listData')->name('human-resource-master-employee-list-data');
                Route::get(' /master-employee-form-add', 'HumanResource\EmployeeController@formAdd')->name('human-resource-master-employee-form-add');
                Route::post(' /master-employee-store-data', 'HumanResource\EmployeeController@storeData')->name('human-resource-master-employee-store-data');

                Route::get(' /master-employee/form-detail/{id}', 'HumanResource\EmployeeController@formDetail')->name('human-resource-master-employee-form-detail');
                Route::get(' /master-employee/form-edit/{id}/edit', 'HumanResource\EmployeeController@formEdit')->name('human-resource-master-employee-form-edit');
                Route::post(' /master-employee/form-update/{id}', 'HumanResource\EmployeeController@formUpdate')->name('human-resource-master-employee-form-update');
                Route::post(' /master-employee/keluarga-update/{id}', 'HumanResource\EmployeeController@formUpdatekeluarga')->name('human-resource-master-employee-form-update-keluarga');

                Route::delete(' /master-employee/keluarga-delete', 'HumanResource\EmployeeController@Deletekeluarga')->name('human-resource-master-employee-form-delete');
                Route::get(' /master-employee/cetak-pdf', 'HumanResource\EmployeeController@cetakPDF')->name('human-resource-master-employee-cetak-pdf');

                Route::prefix('data-gaji-pegawai')->group(function () {

                    Route::prefix('daftar-gaji')->group(function () {
                        Route::get('/list-data', 'HumanResource\DaftarGajiController@listData')->name('data-gaji-pegawai.human-resource-pegawai-list-data');
                        Route::get('/get-gaji', 'HumanResource\DaftarGajiController@getEmployee')->name('data-gaji-pegawai.human-resource-pegawai-getEmployee');
                        Route::post(' /form-simpan', 'HumanResource\DaftarGajiController@formSimpan')->name('data-gaji-pegawai.human-resource-pegawai-form-simpan');
                        Route::post(' /form-update/{id}', 'HumanResource\DaftarGajiController@formUpdate')->name('data-gaji-pegawai.human-resource-pegawai-form-update');
                        Route::delete('/form-delete', 'HumanResource\DaftarGajiController@formDelete')->name('data-gaji-pegawai.form-delete');

                        Route::get(' /daftar-gaji/cetak-pdf', 'HumanResource\DaftarGajiController@cetakPDF')->name('data-gaji-pegawai.human-resource-pegawai-cetak-pdf');
                    });

                    Route::prefix('request-gaji')->group(function () {
                        Route::get('/list-request-gaji', 'HumanResource\RequestGajiController@getRequestGaji')->name('human-resource.pegawai.request-gaji.list-gaji');
                        Route::get('/form-tambah-request-gaji', 'HumanResource\RequestGajiController@getFormTambah')->name('human-resource.pegawai.request-gaji.form-tambah');
                        Route::post('/form-simpan-request-gaji', 'HumanResource\RequestGajiController@SimpanRequest')->name('human-resource.pegawai.request-gaji.form-simpan');
                        Route::get('/get-employee-request-gaji', 'HumanResource\RequestGajiController@getEmployee')->name('human-resource.pegawai.request-gaji.get-employee-request-gaji');
                        Route::get('/form-edit-request-gaji', 'HumanResource\RequestGajiController@getFormEdit')->name('human-resource.pegawai.request-gaji.form-edit');

                        Route::prefix('request-kasbon')->group(function () {
                            Route::post('/form-request-kasbon', 'HumanResource\RequestGajiController@RequestKasbon')->name('human-resource.human-resource.pegawai.request-kasbon-karyawan');
                        });
                    });


                    Route::prefix('kinerja-karyawan')->group(function () {
                        Route::get('/list-request-gaji', 'HumanResource\KinerjaKaryawanController@getKinerjaKaryawan')->name('human-resource.pegawai.kinerja-karyawan.list-kinerja');
                    });
                    Route::prefix('data-absensi')->group(function () {
                        Route::get('/list-data-absensi', 'HumanResource\DataAbsensiController@getDataAbsensi')->name('human-resource.pegawai.kinerja-karyawan.list-data-absensi');
                        Route::post('/upload-data-absensi', 'HumanResource\DataAbsensiController@uploadAbsensi')->name('human-resource.pegawai.kinerja-karyawan.upload-data-absensi');
                    });
                });
            });


            //HUMAN RESOURCE   Route::resource('human-resource/agent', 'HumanResource\AgentController');
            Route::prefix('status')->group(function () {
                Route::get('/list-status', 'HumanResource\StatusController@getListStatus')->name('human-resource.status.list-status');
                Route::post('/tambah-status', 'HumanResource\StatusController@TambahStatus')->name('human-resource.status.tambah-status');
                Route::post('/update-status/{id}', 'HumanResource\StatusController@UpdateStatus')->name('human-resource.status.update-status');
                Route::delete('/delete-status', 'HumanResource\StatusController@delete')->name('human-resource-status-delete');

                Route::get('/tambah-data-aset', 'HumanResource\Aset\DataAsetController@getTambahDataAset')->name('master-keuangan.aset.data-aset.tambah-data-aset');
            });
            Route::prefix('satuan')->group(function () {
                Route::get('/list-satuan', 'HumanResource\SatuanController@getListSatuan')->name('human-resource.status.list-satuan');
                Route::post('/simpan-satuan', 'HumanResource\SatuanController@SimpanSatuan')->name('human-resource.status.simpan-satuan');
                Route::post('/update-satuan/{id}', 'HumanResource\SatuanController@UpdateSatuan')->name('human-resource.status.update-satuan');
                Route::get('/delete-satuan/{id}', 'HumanResource\SatuanController@DeleteSatuan')->name('human-resource.status.delete-satuan');
                Route::delete('/delete-satuan', 'HumanResource\SatuanController@delete')->name('human-resource.status.delete');

                Route::get('/tambah-data-aset', 'HumanResource\Aset\DataAsetController@getTambahDataAset')->name('master-keuangan.aset.data-aset.tambah-data-aset');
            });

            Route::prefix('agent')->group(function () {
                Route::get('/', 'HumanResource\AgentController@index')->name('human-resource.agent.index');
                Route::post('/store', 'HumanResource\AgentController@store')->name('human-resource-data-agent-store');
                Route::post('/update/{id}', 'HumanResource\AgentController@update')->name('human-resource-agent-update');
                Route::delete('/delete-data-agent', 'HumanResource\AgentController@DeleteAgent')->name('human-resource.data-agent.delete-data-agent');
                Route::get('/cetak-pdf-agent', 'HumanResource\AgentController@AgentPDF')->name('human-resource-agent-cetak-pdf-agent');
            });


//            ======================TATA KELOLA==================================
            Route::prefix('data-kelola')->group(function () {

                Route::prefix('schedule-pariwisata')->group(function () {
                    Route::get('/pariwisata/schedule-pariwisata', 'Transaction\Pariwisata\SchedulePariwisataController@JadwalWisata')->name('admin.transaction.pariwisata.schedule-pariwisata.data');
                    Route::post('/pariwisata/schedule-pariwisata', 'Transaction\Pariwisata\SchedulePariwisataController@TambahJadwalWisata')->name('admin.transaction.pariwisata.tambah.schedule-pariwisata');
                    Route::post('/pariwisata/schedule-pariwisata/{id}', 'Transaction\Pariwisata\SchedulePariwisataController@UpdateJadwalWisata')->name('admin.transaction.pariwisata.update.schedule-pariwisata');

                    Route::get('/pariwisata/schedule-pariwisata/cetak-pdf', 'Transaction\Pariwisata\SchedulePariwisataController@cetakPDF')->name('admin.transaction.pariwisata.schedule-pariwisata.cetak-pdf');
                    Route::post('/pariwisata/schedule-pariwisata/{id}', 'Transaction\Pariwisata\SchedulePariwisataController@UpdateJadwalWisata')->name('admin.transaction.pariwisata.update.schedule-pariwisata');
                });


                Route::prefix('surat-menyurat')->group(function () {
                    Route::get('/list-template-surat', 'TataKelola\TemplateSuratController@getSurat')->name('data-kelola.surat-menyurat.list-template-surat');
                    Route::post('/tambah-template-surat', 'TataKelola\TemplateSuratController@TambahSurat')->name('data-kelola.surat-menyurat.tambah-template-surat');

                    Route::get('/download-pdf/{filename}', 'TataKelola\TemplateSuratController@downloadPdf')->name('data-kelola.surat-menyurat.download-pdf');

                });

                Route::prefix('dokumen-final')->group(function () {
                    Route::get('/list-dokumen-final', 'TataKelola\DokumenFinalController@getDokumen')->name('data-kelola.surat-menyurat.list-dokumen-final');
                    Route::post('/tambah-dokumen-final', 'TataKelola\DokumenFinalController@TambahDokumen')->name('data-kelola.surat-menyurat.tambah-dokumen-final');

                    Route::post('/archieve-data', 'TataKelola\DokumenFinalController@ArchieveData')->name('data-kelola.surat-menyurat.archieve-data');
                    Route::post('/kembalikan-archieve-data', 'TataKelola\DokumenFinalController@kembalikanArchieveData')->name('data-kelola.surat-menyurat.kembalikan-archieve-data');

                    Route::delete('/delete-dokumen-final', 'TataKelola\DokumenFinalController@HapusDokumen')->name('data-kelola.surat-menyurat.delete-dokumen-final');

                    Route::get('/download-pdf/{filename}', 'TataKelola\DokumenFinalController@downloadPdf')->name('download-pdf-surat');
//                    Route::post('/filter-data', 'TataKelola\DokumenFinalController@filter')->name('data-kelola.surat-menyurat.filter-data');


                });

                Route::prefix('surat-keluar')->group(function () {
                    Route::get('/list-surat-keluar', 'TataKelola\SuratKeluarController@getSuratKeluar')->name('data-kelola.surat-menyurat.list-surat-keluar');
                    Route::post('/tambah-surat-keluar', 'TataKelola\SuratKeluarController@TambahSuratKeluar')->name('data-kelola.surat-menyurat.tambah-surat-keluar');
                    Route::delete('/delete-surat-keluar', 'TataKelola\SuratKeluarController@HapusSuratKeluar')->name('data-kelola.surat-menyurat.delete-surat-keluar');
                });

                Route::prefix('kontraks')->group(function () {
                    Route::get('/list-kontrak', 'TataKelola\KontrakController@getKontrak')->name('data-kelola.surat-menyurat.list-kontrak');
                    Route::post('/tambah-kontrak', 'TataKelola\KontrakController@TambahKontrak')->name('data-kelola.surat-menyurat.tambah-kontrak');
                    Route::delete('/delete-kontrak', 'TataKelola\KontrakController@HapusKontrak')->name('data-kelola.surat-menyurat.delete-kontrak');
                });

            });

            //MASTER KEUANGAN
            Route::prefix('master-keuangan')->group(function () {
                Route::prefix('akun')->group(function () {
                    Route::get('/list-akun', 'MasterKeuangan\AkunController@getListAkun')->name('master-keuangan.akun.list-akun');
                    Route::post('/tambah-akun', 'MasterKeuangan\AkunController@TambahAkun')->name('master-keuangan.akun.tambah-akun');
                    Route::post('/update-akun/{id}', 'MasterKeuangan\AkunController@UpdateAkun')->name('master-keuangan.akun.update-akun');
                    Route::delete('/delete-akun', 'MasterKeuangan\AkunController@DeleteAkun')->name('master-keuangan.akun.delete-akun');
                });

                Route::prefix('sub-akun')->group(function () {
                    Route::get('/list-sub-akun', 'MasterKeuangan\SubAkunController@getListSubAkun')->name('master-keuangan.sub-akun.list-sub-akun');
                    Route::post('/tambah-sub-akun', 'MasterKeuangan\SubAkunController@TambahSubAkun')->name('master-keuangan.sub-akun.tambah-sub-akun');
                    Route::post('/update-sub-akun/{id}', 'MasterKeuangan\SubAkunController@UpdateSubAkun')->name('master-keuangan.sub-akun.update-sub-akun');

                    Route::get('/sub-akun/cetak-pdf', 'MasterKeuangan\SubAkunController@cetakPDF')->name('admin.master-keuangan.sub-akun.cetak-pdf');
                    Route::delete('/sub-akun/delete', 'MasterKeuangan\SubAkunController@DeleteSubAkun')->name('admin.master-keuangan.sub-akun.delete');


                });

                Route::prefix('aset')->group(function () {
                    Route::prefix('data-aset')->group(function () {
                        Route::get('/list-aset', 'MasterKeuangan\Aset\DataAsetController@getListAset')->name('master-keuangan.aset.list-data-aset');
                        Route::get('/tambah-data-aset', 'MasterKeuangan\Aset\DataAsetController@getTambahDataAset')->name('master-keuangan.aset.data-aset.tambah-data-aset');
                        Route::post('/simpan-data-aset', 'MasterKeuangan\Aset\DataAsetController@SimpanDataAset')->name('master-keuangan.aset.data-aset.simpan-data-aset');
                    });

                    Route::prefix('tipe-aset')->group(function () {
                        Route::get('/list-tipe-aset', 'MasterKeuangan\Aset\TipeAsetController@getTipeAset')->name('master-keuangan.aset.tipe-aset');
                        Route::post('/tambah-tipe-aset', 'MasterKeuangan\Aset\TipeAsetController@TambahTipeAset')->name('master-keuangan.aset.tambah-tipe-aset');
                        Route::post('/update-tipe-aset/{id}', 'MasterKeuangan\Aset\TipeAsetController@UpdateTipeAset')->name('master-keuangan.aset.update-tipe-aset');
                        Route::get('/delete-tipe-aset/{id}', 'MasterKeuangan\Aset\TipeAsetController@DeleteTipeAset')->name('master-keuangan.aset.delete-tipe-aset');

                    });

                    Route::prefix('kategori-aset')->group(function () {
                        Route::get('/list-kategori-aset', 'MasterKeuangan\Aset\KategoriAsetController@getKategoriAset')->name('master-keuangan.aset.list-kategori-aset');
                        Route::post('/tambah-kategori-aset', 'MasterKeuangan\Aset\KategoriAsetController@TambahKategoriAset')->name('master-keuangan.aset.tambah-kategori-aset');
                        Route::post('/update-kategori-aset/{id}', 'MasterKeuangan\Aset\KategoriAsetController@UpdateKategoriAset')->name('master-keuangan.aset.update-kategori-aset');
                        Route::get('/delete-kategori-aset/{id}', 'MasterKeuangan\Aset\KategoriAsetController@DeleteKategoriAset')->name('master-keuangan.aset.delete-kategori-aset');
                        Route::get('/cetak-pdf-kategori-aset', 'MasterKeuangan\Aset\KategoriAsetController@CetakPDFKategoriAset')->name('master-keuangan.aset.cetak-pdf-kategori-aset');

                    });

                    Route::prefix('kategori-pajak')->group(function () {
                        Route::get('/list-kategori-pajak', 'MasterKeuangan\KategoriPajakController@getKategoriPajak')->name('master-keuangan.aset.list-kategori-pajak');
                        Route::post('/tambah-kategori-pajak', 'MasterKeuangan\KategoriPajakController@TambahKategoriPajak')->name('master-keuangan.aset.tambah-kategori-pajak');
                        Route::post('/update-kategori-pajak/{id}', 'MasterKeuangan\KategoriPajakController@UpdateKategoriPajak')->name('master-keuangan.aset.update-kategori-pajak');
                        Route::get('/delete-kategori-pajak/{id}', 'MasterKeuangan\KategoriPajakController@DeleteKategoriPajak')->name('master-keuangan.aset.delete-kategori-pajak');
                        Route::get('/cetak-pdf', 'MasterKeuangan\KategoriPajakController@PdfPajak')->name('master-keuangan.aset.cetak-pdf');
                    });

                    Route::prefix('metode-penyusutan')->group(function () {
                        Route::get('/list-metode-penyusutan', 'MasterKeuangan\MetodePenyusutanController@getMetodePenyusutan')->name('master-keuangan.metode-penyusutan.list-metode-penyusutan');
                        Route::post('/tambah-metode-penyusutan', 'MasterKeuangan\MetodePenyusutanController@TambahMetodePenyusutan')->name('master-keuangan.metode-penyusutan.tambah-metode-penyusutan');
                        Route::post('/update-metode-penyusutan/{id}', 'MasterKeuangan\MetodePenyusutanController@UpdateMetodePenyusutan')->name('master-keuangan.metode-penyusutan.update-metode-penyusutan');
                        Route::get('/delete-metode-penyusutan/{id}', 'MasterKeuangan\MetodePenyusutanController@DeleteMetodePenyusutan')->name('master-keuangan.metode-penyusutan.delete-metode-penyusutan');
                        Route::get('/cetak-pdf', 'MasterKeuangan\MetodePenyusutanController@PenyusutanPDF')->name('master-keuangan.metode-penyusutan.cetak-pdf');
                    });

                });


            });


            //MANAJEMEN LOGISTIK
            Route::prefix('master-logistik')->group(function () {

                Route::prefix('bagian')->group(function () {
                    Route::get('/list-bagian', 'MasterLogistik\BagianController@getListBagian')->name('admin.master-logistik.bagian.list-bagian');
                    Route::post('/tambah-bagian', 'MasterLogistik\BagianController@TambahBagian')->name('admin.master-logistik.bagian.tambah-bagian');
                    Route::get('/edit-bagian/{id}', 'MasterLogistik\BagianController@EditBagian')->name('admin.master-logistik.bagian.edit-bagian');
                    Route::post('/update-bagian/{id}', 'MasterLogistik\BagianController@UpdateBagian')->name('admin.master-logistik.bagian.update-bagian');
                    Route::get('/delete-bagian/{id}', 'MasterLogistik\BagianController@DeleteBagian')->name('admin.master-logistik.bagian.delete-bagian');

                });

                Route::prefix('sub-bagian')->group(function () {
                    Route::get('/list-sub-bagian', 'MasterLogistik\SubBagianController@getSubBagian')->name('admin.master-logistik.bagian.sub-bagian');

                    Route::post('/tambah-sub-bagian', 'MasterLogistik\SubBagianController@TambahSubBagian')->name('admin.master-logistik.bagian.tambah-sub-bagian');
                    Route::post('/edit-sub-bagian/{id}', 'MasterLogistik\SubBagianController@EditSubBagian')->name('admin.master-logistik.bagian.edit-sub-bagian');
                    Route::post('/update-sub-bagian/{id}', 'MasterLogistik\SubBagianController@UpdateSubBagian')->name('admin.master-logistik.bagian.update-sub-bagian');
                    Route::get('/delete-sub-bagian/{id}', 'MasterLogistik\SubBagianController@DeleteSubBagian')->name('admin.master-logistik.bagian.delete-sub-bagian');


                    Route::get('/sub-bagian/cetak-pdf', 'MasterLogistik\SubBagianController@cetakPDF')->name('admin.master-logistik.bagian.cetak-pdf');
                });

                Route::prefix('komponen')->group(function () {
                    Route::get('/list-komponen', 'MasterLogistik\KomponenController@getKomponen')->name('admin.master-logistik.komponen.list-komponen');
                    Route::post('/simpan-komponen', 'MasterLogistik\KomponenController@SimpanKomponen')->name('admin.master-logistik.komponen.simpan-komponen');
                    Route::post('/edit-komponen/{id}', 'MasterLogistik\KomponenController@EditKomponen')->name('admin.master-logistik.komponen.edit-komponen');
                    Route::get('/detail-komponen/{id}', 'MasterLogistik\KomponenController@DetailKomponen')->name('admin.master-logistik.komponen.detail-komponen');
                    Route::get('/delete-komponen/{id}', 'MasterLogistik\KomponenController@DeleteKomponen')->name('admin.master-logistik.komponen.delete-komponen');

                });


                Route::prefix('alat-kerja-bengkel')->group(function () {
                    Route::get('/list-alat-kerja-bengkel', 'MasterLogistik\AlatBengkelController@getAlatBengkel')->name('admin.master-logistik.alat-kerja-bengkel.list-alat-kerja-bengkel');
                    Route::post('/simpan-alat-kerja-bengkel', 'MasterLogistik\AlatBengkelController@SimpanAlatBengkel')->name('admin.master-logistik.alat-kerja-bengkel.simpan-alat-kerja-bengkel');
                    Route::post('/update-alat-kerja-bengkel/{id}', 'MasterLogistik\AlatBengkelController@UpdateAlatBengkel')->name('admin.master-logistik.alat-kerja-bengkel.update-alat-kerja-bengkel');
                    Route::get('/delete-alat-kerja-bengkel/{id}', 'MasterLogistik\AlatBengkelController@DeleteAlatBengkel')->name('admin.master-logistik.alat-kerja-bengkel.delete-alat-kerja-bengkel');
                });


                Route::prefix('bengkel-luar')->group(function () {
                    Route::get('/list-bengkel-luar', 'MasterLogistik\BengkelLuarController@getBengkelLuar')->name('admin.master-logistik.bengkel-luar.list-bengkel-luar');
                    Route::post('/simpan-bengkel-luar', 'MasterLogistik\BengkelLuarController@SimpanBengkelLuar')->name('admin.master-logistik.bengkel-luar.simpan-bengkel-luar');
                    Route::post('/edit-bengkel-luar/{id}', 'MasterLogistik\BengkelLuarController@EditBengkelLuar')->name('admin.master-logistik.bengkel-luar.edit-bengkel-luar');
                    Route::get('/delete-bengkel-luar/{id}', 'MasterLogistik\BengkelLuarController@DeleteBengkelLuar')->name('admin.master-logistik.bengkel-luar.delete-bengkel-luar');
                });

                Route::prefix('toko')->group(function () {
                    Route::get('/list-toko', 'MasterLogistik\TokoController@getToko')->name('admin.master-logistik.toko.list-toko');
                    Route::post('/simpan-toko', 'MasterLogistik\TokoController@SimpanToko')->name('admin.master-logistik.toko.simpan-toko');
                    Route::post('/update-toko/{id}', 'MasterLogistik\TokoController@UpdateToko')->name('admin.master-logistik.toko.update-toko');
                    Route::get('/delete-toko/{id}', 'MasterLogistik\TokoController@DeleteToko')->name('admin.master-logistik.toko.delete-toko');

                    Route::get('/cetak-pdf-toko', 'MasterLogistik\TokoController@TokoPDF')->name('admin.master-logistik.toko.cetak-pdf-toko');

                });


                Route::prefix('kategori-barang')->group(function () {
                    Route::get('/list-kategori-barang', 'MasterLogistik\KategoriBarangController@getKategoriBarang')->name('master-logistik-list-kategori-barang');
                    Route::post('/simpang-kategori-barang', 'MasterLogistik\KategoriBarangController@postKategoriBarang')->name('master-logistik-simpang-kategori-barang');

                    Route::get('/edit-kategori-barang/{id}', 'MasterLogistik\KategoriBarangController@EditKategoriBarang')->name('master-logistik.edit-kategori-barang');
                    Route::post('/update-kategori-barang/{id}', 'MasterLogistik\KategoriBarangController@UpdateKategoriBarang')->name('master-logistik.update-kategori-barang');

                    Route::delete('/delete-kategori-barang', 'MasterLogistik\KategoriBarangController@DeleteKategoriBarang')->name('master-logistik.delete-kategori-barang');

                    Route::get('/cetak-pdf-kategori-barang', 'MasterLogistik\KategoriBarangController@CetakPDF')->name('master-logistik.cetak-pdf-kategori-barang');

                });

                Route::prefix('supplier-barang')->group(function () {
                    Route::get('/list-supplier-barang', 'MasterLogistik\SupplierBarangController@getSupplierBarang')->name('master-logistik-list-supplier-barang');
                    Route::post('/create-supplier-barang', 'MasterLogistik\SupplierBarangController@postCreateBarang')->name('master-logistik-create-supplier-barang');
                    Route::post('/simpan-supplier-barang', 'MasterLogistik\SupplierBarangController@postSimpanBarang')->name('master-logistik-simpan-supplier-barang');

                });


                Route::prefix('rekap-keluar-masuk-logistik')->group(function () {
                    Route::get('/list-data-keluar', 'MasterLogistik\RekapKeluarMasuk\Keluar\LogistikKeluarController@getRekapKeluar')->name('master-logistik.rekap-keluar-logistik.list-data-keluar');

                    Route::prefix('sparepart')->group(function () {
                        Route::get('/list-data', 'MasterLogistik\RekapKeluarMasuk\Keluar\SparePartController@getSparepart')->name('master-logistik-logbook-sparepart-list-data');
                    });
                    Route::prefix('logistik')->group(function () {
                        Route::get('/list-data-logistik', 'MasterLogistik\RekapKeluarMasuk\Keluar\LogistikController@getLogistik')->name('master-logistik-logbook-logistik-list-data');
                    });
                    Route::prefix('atk')->group(function () {
                        Route::get('/list-data-atk', 'MasterLogistik\RekapKeluarMasuk\Keluar\AtkController@getAtk')->name('master-logistik-logbook-atk-list-data');
                    });
                    //rekap Data Masuk
                    Route::prefix('rekap-masuk')->group(function () {
                        Route::get('/list-data-masuk', 'MasterLogistik\RekapKeluarMasuk\Masuk\RekapMasukController@getDataMasuk')->name('master-logistik-masuk-list-rekap-data');


                        Route::prefix('sparepart-masuk')->group(function () {
                            Route::get('/list-sparepart-masuk', 'MasterLogistik\RekapKeluarMasuk\Masuk\SparepartController@getSparepartMasuk')->name('master-logistik-masuk-list-sparepart');
                        });

                        Route::prefix('logistik-masuk')->group(function () {
                            Route::get('/list-logistik-masuk', 'MasterLogistik\RekapKeluarMasuk\Masuk\LogistikController@getLogistikMasuk')->name('master-logistik-masuk-list-logistik');
                        });

                        Route::prefix('atk-masuk')->group(function () {
                            Route::get('/list-atk-masuk', 'MasterLogistik\RekapKeluarMasuk\Masuk\AtkController@getAtkMasuk')->name('master-logistik-masuk-list-atk');
                        });
                    });

                    //==================================Pengajuan Pembelian
                    Route::prefix('pengajuan-pembelian')->group(function () {
                        Route::get('/list-pengajuan-pembelian', 'MasterLogistik\PengajuanPembelianController@getPengajuanPembelian')->name('master-logistik-list-pengajuan-pembelian');

                        Route::get('/detail-pengajuan-pembelian/{id}', 'MasterLogistik\PengajuanPembelianController@detailPengajuanPembelian')->name('master-logistik-detail-pengajuan-pembelian');
                        Route::post('/tambah-pengajuan-pembelian', 'MasterLogistik\PengajuanPembelianController@TambahPengajuanPembelian')->name('master-logistik-tambah-pengajuan-pembelian');
                        Route::post('/tambah-item-pembelian', 'MasterLogistik\PengajuanPembelianController@TambahItemPembelian')->name('master-logistik-tambah-item-pembelian');

                        Route::post('/terpilih-pengajuan-pembelian', 'MasterLogistik\PengajuanPembelianController@terpilih')->name('master-logistik-terpilih-pengajuan-pembelian');
                        Route::post('/dana-pengajuan-terkirim', 'MasterLogistik\PengajuanPembelianController@LaporanDanaTerkirim')->name('master-logistik-terkirim-pengajuan-dana');

                        Route::post('/terpilih-delete-pengajuan-pembelian', 'MasterLogistik\PengajuanPembelianController@terpilihDelete')->name('master-logistik-terpilih-delete-pengajuan-pembelian');
                        Route::post('/proses-terpilih-pengajuan-pembelian', 'MasterLogistik\PengajuanPembelianController@prosesTerpilih')->name('master-logistik-proses-terpilih-pengajuan-pembelian');

                        Route::post('/setuju-terpilih-pengajuan-pembelian', 'MasterLogistik\PengajuanPembelianController@setujuTerpilih')->name('master-logistik-setuju-terpilih-pengajuan-pembelian');
                        Route::post('/cairkan-dana-pengajuan-pembelian', 'MasterLogistik\PengajuanPembelianController@CairkanDana')->name('master-logistik-cairkan-dana-pengajuan-pembelian');



                        Route::post('/update-pengajuan-pembelian/{id}', 'MasterLogistik\PengajuanPembelianController@UpdatePengajuanPembelian')->name('master-logistik-update-pengajuan-pembelian');

                        Route::post('/ajukan-pengajuan-pembelian', 'MasterLogistik\PengajuanPembelianController@AjukanPengajuanPembelian')->name('master-logistik.ajukan-pengajuan-pembelian');
                        Route::delete('/delete-pengajuan-pembelian', 'MasterLogistik\PengajuanPembelianController@DeletePengajuanPembelian')->name('master-logistik-delete-pengajuan-pembelian');
                    });


                    Route::prefix('rekap-pembelian')->group(function () {
                        Route::get('/list-rekap-pembelian', 'MasterLogistik\RekapPembelianController@RekapPembelian')->name('master-logistik-list-rekap-pembelian');
                        Route::get('/detail-rekap-pembelian/{id}', 'MasterLogistik\RekapPembelianController@DetailRekapPembelian')->name('master-logistik-detail-rekap-pembelian');

                        Route::get('/setujui-pengajuan-pembelian/{id}', 'MasterLogistik\RekapPembelianController@setujuiPengajuanPembelian')->name('master-logistik-setujui-pengajuan-pembelian');
                        Route::get('/tolak-pengajuan-pembelian/{id}', 'MasterLogistik\RekapPembelianController@TolakPengajuanPembelian')->name('master-logistik-tolak-pengajuan-pembelian');
                    });

                    //Laporan Pembelian
                    Route::prefix('laporan-pembelian')->group(function () {
                        Route::get('/laporan-pengajuan-pembelian', 'MasterLogistik\LaporanPembelianController@getLaporanPembelian')->name('master-logistik-laporan-pengajuan-pembelian');
                        Route::get('/detail-laporan-pengajuan-pembelian/{id}', 'MasterLogistik\LaporanPembelianController@DetailLaporanPembelian')->name('master-logistik-detail-laporan-pengajuan-pembelian');
                        Route::post('/simpan-laporan-pengajuan-pembelian', 'MasterLogistik\LaporanPembelianController@SimpanLaporanPembelian')->name('master-logistik-simpan-laporan-pengajuan-pembelian');

                    });
                });

                Route::prefix('notif-permintaan-logistik')->group(function () {
                    Route::get('/', 'MasterLogistik\NotifPermintaan\NotifPermintaanLogistikController@index')->name('master-logistik-notif-permintaan-index');
                });
                Route::prefix('logistik-masuk')->group(function () {
                    Route::get('/', 'MasterLogistik\LogistikMasuk\LogistikMasukController@index')->name('master-logistik-logistik-masuk-index');
                });
                Route::prefix('logistik-keluar')->group(function () {
                    Route::get('/', 'MasterLogistik\LogistikKeluar\LogistikKeluarController@index')->name('master-logistik-logistik-keluar-index');
                });
                Route::prefix('notif-perbaikan-bengkel-luar')->group(function () {
                    Route::get('/', 'MasterLogistik\NotifPerbaikanBengkel\NotifPerbaikanBengkelLuarController@index')->name('master-logistik-notif-perbaikan-bengkel-luar-index');
                });

            });


            #region Dashboard
            Route::get('dashboard', 'Dashboard\DashboardController@index')->name('dashboard');
            #endregion

            #region General
            Route::resource('general/notification', 'General\NotificationController');
            #endregion

            #region Master Data
//            =====================================================================================================
            Route::prefix('master-data')->group(function () {
                Route::get('/travel-facility', 'MasterData\TravelFacilityController@getTravelFacility')->name('travel-facility');
                Route::post('/simpan-travel-facility', 'MasterData\TravelFacilityController@TambahTravelFacility')->name('simpan-travel-facility');
                Route::delete('/delete-travel-facility', 'MasterData\TravelFacilityController@DeleteTravelFacility')->name('delete-travel-facility');
            });
            Route::resource('master-data/pick-point', 'MasterData\PickPointController');
            Route::resource('master-data/premi', 'MasterData\PremiController');
            Route::resource('master-data/salary', 'MasterData\SalaryController');
            Route::resource('master-data/armada', 'MasterData\ArmadaController');
            Route::resource('master-data/unit', 'MasterData\UnitController');
            Route::resource('master-data/facility', 'MasterData\FacilityController');
            Route::resource('master-data/service', 'MasterData\ServiceController');
            Route::resource('master-data/office', 'MasterData\OfficeController');
            Route::resource('master-data/department', 'MasterData\DepartmentController');
            Route::resource('master-data/position', 'MasterData\PositionController');
            Route::resource('master-data/province', 'MasterData\ProvinceController');
            Route::resource('master-data/city', 'MasterData\CityController');
            Route::resource('master-data/status', 'MasterData\StatusController');
            Route::resource('master-data/schedule', 'MasterData\ScheduleController');
            Route::resource('master-data/day-off', 'MasterData\DayOffController');
            Route::resource('master-data/bus', 'MasterData\BusController');
            Route::resource('master-data/location-wisata', 'MasterData\LocationWisataController');
            Route::resource('master-data/destination-wisata', 'MasterData\DestinationWisataController');
            Route::resource('master-data/route-wisata', 'MasterData\RouteWisataController');
            // Route::resource('master-data/price-bus-wisata', 'MasterData\PriceBusWisataController');

            // Wisata

            // Additional
            Route::get('master-data/department/get-position-by-department/{id}', 'MasterData\DepartmentController@getPositionByDepartment');
            Route::get('master-data/province/get-city-by-province/{id}', 'MasterData\ProvinceController@getCityByProvince');

            #endregion

            #region Management Customer
            Route::resource('management-customer/customer', 'ManagementCustomer\CustomerController');
            Route::resource('management-customer/inbox', 'ManagementCustomer\InboxController');
            #endregion

            #region Human Resource
            Route::resource('human-resource/master-employee', 'HumanResource\EmployeeController');
            #endregion

            #region Finance & Accounting
            Route::get('master-data/department/get-position-by-department/{id}', 'MasterData\DepartmentController@getPositionByDepartment');
            Route::get('master-data/province/get-city-by-province/{id}', 'MasterData\ProvinceController@getCityByProvince');
            #endregion

            #region Management Customer
            Route::resource('management-customer/customer', 'ManagementCustomer\CustomerController');
            #endregion

            #region Human Resource
            Route::resource('human-resource/master-employee', 'HumanResource\EmployeeController');
            Route::resource('human-resource/driver-conductor', 'HumanResource\DriverConductorController');
//            Route::resource('human-resource/agent', 'HumanResource\AgentController');
            #endregion

            #region Transaction
            // REGULER
            Route::resource('transaction/reguler/booking-reguler', 'Transaction\Reguler\BookingRegulerController');
            Route::get('transaction/reguler/booking/get/master-customer', 'Transaction\Reguler\BookingRegulerController@getMasterCustomer');
            Route::get('transaction/reguler/booking/get/master-pick-point', 'Transaction\Reguler\BookingRegulerController@getMasterPickPoint');
            Route::post('transaction/reguler/booking/check-schedule', 'Transaction\Reguler\BookingRegulerController@getScheduleReguler');
            Route::post('transaction/reguler/booking/pick-seat', 'Transaction\Reguler\BookingRegulerController@getSeatReguler');
            Route::post('transaction/reguler/booking/submit-reguler', 'Transaction\Reguler\BookingRegulerController@submitTransactionReguler');
            Route::resource('transaction/reguler/data-transaction-reguler', 'Transaction\Reguler\DataTransactionRegulerController');
            Route::post('transaction/reguler/data-transaction-reguler/submit-payment', 'Transaction\Reguler\DataTransactionRegulerController@submitPayment');
            Route::get('transaction/reguler/data-transaction-reguler/print-invoice/{booking_code}', 'Transaction\Reguler\DataTransactionRegulerController@printInvoice');
            Route::get('transaction/reguler/data-transaction-reguler/print-kwitansi/{booking_code}', 'Transaction\Reguler\DataTransactionRegulerController@printKwitansi');
            Route::resource('transaction/reguler/report-transaction-reguler', 'Transaction\Reguler\ReportTransactionRegulerController');
            // Scheduling
            // REGULER
            Route::resource('transaction/reguler/schedule-reguler', 'Transaction\Reguler\ScheduleRegulerController');
            Route::get('transaction/reguler/schedule-reguler/get-data/armada', 'Transaction\Reguler\ScheduleRegulerController@getDataArmada');
            Route::get('transaction/reguler/schedule-reguler/get-data/driver', 'Transaction\Reguler\ScheduleRegulerController@getDataDriver');
            Route::get('transaction/reguler/schedule-reguler/get-data/conductor', 'Transaction\Reguler\ScheduleRegulerController@getDataConductor');
            Route::post('transaction/reguler/schedule-reguler/check-schedule-reguler', 'Transaction\Reguler\ScheduleRegulerController@checkScheduleReguler');
            Route::resource('transaction/reguler/reschedule-reguler', 'Transaction\Reguler\RescheduleRegulerController');
            Route::post('transaction/reguler/reschedule-reguler/re-schedule', 'Transaction\Reguler\RescheduleRegulerController@rescheduleReguler');
            // PARIWISATA
//            Route::resource('transaction/pariwisata/schedule-pariwisata', 'Transaction\Pariwisata\SchedulePariwisataController');


            // PARIWISATA
            Route::resource('transaction/pariwisata/booking-pariwisata', 'Transaction\Pariwisata\BookingPariwisataController');
            Route::get('transaction/pariwisata/booking/get/master-customer', 'Transaction\Pariwisata\BookingPariwisataController@getMasterCustomer');
            Route::post('transaction/pariwisata/booking/schedule-bus', 'Transaction\Pariwisata\BookingPariwisataController@scheduleBus');
            Route::post('transaction/pariwisata/booking/calculate-estimation', 'Transaction\Pariwisata\BookingPariwisataController@calculateEstimation');
            Route::post('transaction/pariwisata/booking/calculate-estimation-day', 'Transaction\Pariwisata\BookingPariwisataController@getEstimationDayRouteWisata');
            Route::post('transaction/pariwisata/booking/check-available-bus', 'Transaction\Pariwisata\BookingPariwisataController@checkAvailableBus');
            Route::post('transaction/pariwisata/booking/check-available-armada', 'Transaction\Pariwisata\BookingPariwisataController@checkAvailableArmada');
            Route::post('transaction/pariwisata/booking/save-offering-pariwisata', 'Transaction\Pariwisata\BookingPariwisataController@savePariwisataOffering');
            Route::post('transaction/pariwisata/booking/submit-pariwisata', 'Transaction\Pariwisata\BookingPariwisataController@submitTransactionPariwisata');
            Route::get('transaction/pariwisata/data-transaction-pariwisata/print-invoice/{booking_code}', 'Transaction\Pariwisata\DataTransactionPariwisataController@printInvoice');


            // NEW
            Route::post('transaction/pariwisata/booking/check-bus-availability', 'Transaction\Pariwisata\BookingPariwisataController@checkBusAvailability');


            // PRINT
            Route::get('transaction/pariwisata/booking/print-offering-wisata/{data}', 'Transaction\Pariwisata\BookingPariwisataController@printOfferingWisata');
            // Route::post('transaction/pariwisata/booking/print/print-offering/wisata/{data}', 'Transaction\Pariwisata\BookingPariwisataController@printDataOfferingWisata');

            Route::resource('transaction/pariwisata/data-transaction-pariwisata', 'Transaction\Pariwisata\DataTransactionPariwisataController');
            // PARIWISATA
            #endregion

            #region Finance & Accounting
            // MASTER DATA
            Route::resource('finance-accounting/master-data/account', 'FinanceAccounting\MasterData\AccountController');
            Route::resource('finance-accounting/master-data/group-account', 'FinanceAccounting\MasterData\GroupAccountController');
            Route::post('finance-accounting/master-data/group-account/update-group-account', 'FinanceAccounting\MasterData\GroupAccountController@updateGroupAccount');
            Route::resource('finance-accounting/master-data/bank', 'FinanceAccounting\MasterData\BankController');
            Route::resource('finance-accounting/master-data/balance-aktiva', 'FinanceAccounting\MasterData\BalanceAktivaController');
            Route::resource('finance-accounting/master-data/balance-pasiva', 'FinanceAccounting\MasterData\BalancePasivaController');
            Route::get('finance-accounting/master-data/balance-aktiva/get-detail-balance-aktiva/{id}', 'FinanceAccounting\MasterData\BalanceAktivaController@getAccountByAktiva');
            Route::post('finance-accounting/master-data/balance-aktiva/submit-account-aktiva/{id}', 'FinanceAccounting\MasterData\BalanceAktivaController@submitAccountAktiva');
            Route::get('finance-accounting/master-data/balance-pasiva/get-detail-balance-pasiva/{id}', 'FinanceAccounting\MasterData\BalancePasivaController@getAccountByPasiva');
            Route::post('finance-accounting/master-data/balance-pasiva/submit-account-pasiva/{id}', 'FinanceAccounting\MasterData\BalancePasivaController@submitAccountPasiva');
            // Journal
            Route::resource('finance-accounting/journal', 'FinanceAccounting\JournalController');
            Route::get('finance-accounting/journal/get-data/account', 'FinanceAccounting\JournalController@getDataAccount');
            Route::post('finance-accounting/journal/convert-data/excel', 'FinanceAccounting\JournalController@generateExceltoJSON');
            Route::resource('finance-accounting/filter-accounting', 'FinanceAccounting\FilterAccountingController');
            Route::get('finance-accounting/filter-accounting/get-data/all-data-finance-accounting', 'FinanceAccounting\FilterAccountingController@getAllDataFinance');
            Route::post('finance-accounting/filter-accounting/get-data/filtered', 'FinanceAccounting\FilterAccountingController@getFilteredDataJournal');
            Route::resource('finance-accounting/cash-flow', 'FinanceAccounting\CashFlowController');

            // TRANSACTION
            Route::resource('finance-accounting/reservation-transaction', 'FinanceAccounting\ReservationTransactionController');
            Route::resource('finance-accounting/payment-request', 'FinanceAccounting\PaymentRequestController');
            Route::post('finance-accounting/payment-request/payment-approve-reject', 'FinanceAccounting\PaymentRequestController@paymentApproveReject');

            #endregion Menu Keuangan Finance Accounting
            #Start Peter
            Route::prefix('finance')->group(function () {
                Route::prefix('jurnal-umum')->group(function () {
                    Route::get('/', 'FinanceAccounting\MenuKeuangan\Finance\JurnalUmumController@index')->name('finance-accounting-menu-keuangan-finance-jurnal-umum-index');
                    Route::post('/store', 'FinanceAccounting\MenuKeuangan\Finance\JurnalUmumController@store')->name('finance-accounting-menu-keuangan-finance-jurnal-umum-store');
                    Route::post('/update/{id}', 'FinanceAccounting\MenuKeuangan\Finance\JurnalUmumController@update')->name('finance-accounting-menu-keuangan-finance-jurnal-umum-update');
                    Route::delete('/delete', 'FinanceAccounting\MenuKeuangan\Finance\JurnalUmumController@delete')->name('finance-accounting-menu-keuangan-finance-jurnal-umum-delete');
                    Route::get('/get-code-group-account', 'FinanceAccounting\MenuKeuangan\Finance\JurnalUmumController@getCodeGroupAccount')->name('finance-accounting-menu-keuangan-finance-jurnal-umum-getCodeGroupAccount');
                });
                Route::prefix('penerimaan')->group(function () {
                    Route::get('/', 'FinanceAccounting\MenuKeuangan\Finance\PenerimaanController@index')->name('finance-accounting-menu-keuangan-finance-penerimaan-index');
                    Route::post('/store', 'FinanceAccounting\MenuKeuangan\Finance\PenerimaanController@store')->name('finance-accounting-menu-keuangan-finance-penerimaan-store');
                    Route::post('/update/{id}', 'FinanceAccounting\MenuKeuangan\Finance\PenerimaanController@update')->name('finance-accounting-menu-keuangan-finance-penerimaan-update');
                    Route::get('/get-bank-code', 'FinanceAccounting\MenuKeuangan\Finance\PenerimaanController@getBankCode')->name('finance-accounting-menu-keuangan-finance-penerimaan-get-bank_code');
                    Route::delete('/delete', 'FinanceAccounting\MenuKeuangan\Finance\PenerimaanController@delete')->name('finance-accounting-menu-keuangan-finance-penerimaan-delete');
                });
                Route::prefix('pembayaran')->group(function () {
                    Route::get('/', 'FinanceAccounting\MenuKeuangan\Finance\PembayaranController@index')->name('finance-accounting-menu-keuangan-finance-pembayaran-index');
                    Route::get('/notifikasi', 'FinanceAccounting\MenuKeuangan\Finance\PembayaranController@notifikasi')->name('finance-accounting-menu-keuangan-finance-pembayaran-notifikasi-pembayaran');
                    Route::post('/store', 'FinanceAccounting\MenuKeuangan\Finance\PembayaranController@store')->name('finance-accounting-menu-keuangan-finance-pembayaran-store');
                    Route::post('/update/{id}', 'FinanceAccounting\MenuKeuangan\Finance\PembayaranController@update')->name('finance-accounting-menu-keuangan-finance-pembayaran-update');
                    Route::delete('/delete', 'FinanceAccounting\MenuKeuangan\Finance\PembayaranController@delete')->name('finance-accounting-menu-keuangan-finance-pembayaran-delete');
                    Route::get('/get-bank-code', 'FinanceAccounting\MenuKeuangan\Finance\PembayaranController@getBankCode')->name('finance-accounting-menu-keuangan-finance-pembayaran-get-bank_code');
                });
                Route::prefix('transfer-bank')->group(function () {
                    Route::get('/', 'FinanceAccounting\MenuKeuangan\Finance\TransferBankController@index')->name('finance-accounting-menu-keuangan-finance-transfer-bank-index');
                    Route::post('/approved', 'FinanceAccounting\MenuKeuangan\Finance\TransferBankController@approved')->name('finance-accounting-menu-keuangan-finance-transfer-bank-approved');
                });
                Route::prefix('report-finance')->group(function () {
                    Route::get('/', 'FinanceAccounting\MenuKeuangan\Finance\ReportFinanceController@index')->name('finance-accounting-menu-keuangan-finance-report-finance-index');
                    Route::get('/report-jurnal-umum', 'FinanceAccounting\MenuKeuangan\Finance\ReportFinanceController@reportPdfJurnalUmum')->name('finance-accounting-menu-keuangan-finance-report-finance-reportPdfJurnalUmum');
                    Route::get('/report-ringkasan-buku-besar', 'FinanceAccounting\MenuKeuangan\Finance\ReportFinanceController@reportPdfRingkasanBukuBesar')->name('finance-accounting-menu-keuangan-finance-report-finance-reportPdfRingkasanBukuBesar');
                    Route::get('/report-rincian-buku-besar', 'FinanceAccounting\MenuKeuangan\Finance\ReportFinanceController@reportPdfRincianBukuBesar')->name('finance-accounting-menu-keuangan-finance-report-finance-reportPdfRincianBukuBesar');
                    Route::get('/report-histori-buku-besar', 'FinanceAccounting\MenuKeuangan\Finance\ReportFinanceController@reportPdfHistoriBukuBesar')->name('finance-accounting-menu-keuangan-finance-report-finance-reportPdfHistoriBukuBesar');
                    Route::get('/report-laba-rugi', 'FinanceAccounting\MenuKeuangan\Finance\ReportFinanceController@reportPdfLabaRugi')->name('finance-accounting-menu-keuangan-finance-report-finance-reportPdfLabaRugi');
                    Route::get('/report-keseluruhan-jurnal', 'FinanceAccounting\MenuKeuangan\Finance\ReportFinanceController@reportPdfKeseluruhanJurnal')->name('finance-accounting-menu-keuangan-finance-report-finance-reportPdfKeseluruhanJurnal');
                    Route::get('/report-laba-rugi-multi-periode', 'FinanceAccounting\MenuKeuangan\Finance\ReportFinanceController@reportPdfLabaRugiMultiPeriode')->name('finance-accounting-menu-keuangan-finance-report-finance-reportPdfLabaRugiMultiPeriode');
                    Route::get('/report-neraca', 'FinanceAccounting\MenuKeuangan\Finance\ReportFinanceController@reportPdfNeraca')->name('finance-accounting-menu-keuangan-finance-report-finance-reportPdfNeraca');
                    Route::get('/report-neraca-multi-periode', 'FinanceAccounting\MenuKeuangan\Finance\ReportFinanceController@reportPdfNeracaMultiPeriode')->name('finance-accounting-menu-keuangan-finance-report-finance-reportPdfNeracaMultiPeriode');
                });
            });

//            Menu ADMINISTRASI
            Route::prefix('administrasi')->group(function () {
                Route::prefix('voucher')->group(function () {
                    Route::get('/', 'FinanceAccounting\MenuKeuangan\Administrasi\VoucherController@index')->name('finance-accounting-menu-keuangan-administrasi-voucher-index');
                    Route::post('/store', 'FinanceAccounting\MenuKeuangan\Administrasi\VoucherController@store')->name('finance-accounting-menu-keuangan-administrasi-voucher-store');
                    Route::post('/update/{id}', 'FinanceAccounting\MenuKeuangan\Administrasi\VoucherController@update')->name('finance-accounting-menu-keuangan-administrasi-voucher-update');
                    Route::delete('/delete', 'FinanceAccounting\MenuKeuangan\Administrasi\VoucherController@delete')->name('finance-accounting-menu-keuangan-administrasi-voucher-delete');
                });
                Route::prefix('pengajuan-dana')->group(function () {
                    Route::get('/', 'FinanceAccounting\MenuKeuangan\Administrasi\PengajuanDanaController@index')->name('finance-accounting-menu-keuangan-administrasi-pengajuan-dana-index');
                    Route::get('/detail-pengajuan/{id}', 'FinanceAccounting\MenuKeuangan\Administrasi\PengajuanDanaController@detailPengajuan')->name('finance-accounting-menu-keuangan-administrasi-pengajuan-dana-detail-Pengajuan');

//                    Route::post('/detail-pengajuan/terpilih-pengajuan', 'FinanceAccounting\MenuKeuangan\Administrasi\PengajuanDanaController@DataTerpilih')->name('finance.accounting.menu.keuangan.administrasi.pengajuan.dana.terpilih');

                    Route::get('/rekap', 'FinanceAccounting\MenuKeuangan\Administrasi\PengajuanDanaController@rekap')->name('finance-accounting-menu-keuangan-administrasi-pengajuan-dana-rekap');
                    Route::get('/rekap/detail-rekap', 'FinanceAccounting\MenuKeuangan\Administrasi\PengajuanDanaController@rekapDetail')->name('finance-accounting-menu-keuangan-administrasi-pengajuan-dana-rekap-detail');
                });

                Route::prefix('disetujui-pimpinan')->group(function () {
                    Route::get('/', 'FinanceAccounting\MenuKeuangan\Administrasi\PersetujuanPimpinanController@DiSetujuiPimpinan')->name('finance-accounting-menu-keuangan-administrasi-disetujui-pimpinan');
                    Route::get('/dana-ditransfer/{id}', 'FinanceAccounting\MenuKeuangan\Administrasi\PersetujuanPimpinanController@DanaDitransfer')->name('finance-accounting-menu-keuangan-administrasi-dana-ditransfer');
                    Route::get('/dana-chas/{id}', 'FinanceAccounting\MenuKeuangan\Administrasi\PersetujuanPimpinanController@DanaChas')->name('finance-accounting-menu-keuangan-administrasi-dana-chas');
                    Route::get('/pengiriman-dana/{id}', 'FinanceAccounting\MenuKeuangan\Administrasi\PersetujuanPimpinanController@PengirimanDana')->name('finance-accounting-menu-keuangan-administrasi-pengiriman-dana');
                    Route::post('/cairkan-dana-pengajuan/{id}', 'FinanceAccounting\MenuKeuangan\Administrasi\PersetujuanPimpinanController@KirimDana')->name('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-cairkan-dana');
//                    Route::post('/cairkan-dana-pengajuan', 'FinanceAccounting\MenuKeuangan\Administrasi\PersetujuanPimpinanController@CairkanDanaPengajuan')->name('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-cairkan-dana');
                });

                Route::prefix('request-gaji')->group(function () {
                    Route::get('/', 'FinanceAccounting\MenuKeuangan\Administrasi\RequestGajiController@index')->name('finance-accounting-menu-keuangan-administrasi-request-gaji-index');
                });
                Route::prefix('reservasi-transaksi')->group(function () {
                    Route::get('/', 'FinanceAccounting\MenuKeuangan\Administrasi\ReservasiTransaksiController@index')->name('finance-accounting-menu-keuangan-administrasi-reservasi-transaksi-index');
                });
                Route::prefix('rekap-penagihan-transaksi')->group(function () {
                    Route::get('/', 'FinanceAccounting\MenuKeuangan\Administrasi\RekapPenagihanTransaksiController@index')->name('finance-accounting-menu-keuangan-administrasi-rekap-penagihan-transaksi-index');

                });
                Route::prefix('detail-pembelajaan')->group(function () {
                    Route::get('/', 'FinanceAccounting\MenuKeuangan\Administrasi\DetailPembelajaanController@index')->name('finance-accounting-menu-keuangan-administrasi-detail-pembelajaan-index');
                    Route::get('/form-detail', 'FinanceAccounting\MenuKeuangan\Administrasi\DetailPembelajaanController@formDetails')->name('finance-accounting-menu-keuangan-administrasi-detail-pembelajaan-formDetails');
                });
            });

            Route::prefix('kasir')->group(function () {
                Route::prefix('daftar-transaksi')->group(function () {
                    Route::get('/', 'FinanceAccounting\MenuKeuangan\Kasir\DaftarTransaksiController@index')->name('finance-accounting-menu-keuangan-kasir-daftar-transaksi-index');
                    Route::get('/form-kwitansi', 'FinanceAccounting\MenuKeuangan\Kasir\DaftarTransaksiController@formKwitansi')->name('finance-accounting-menu-keuangan-kasir-daftar-transaksi-formKwitansi');
                });
                Route::prefix('laporan-dana-dari-pemandu')->group(function () {
                    Route::get('/', 'FinanceAccounting\MenuKeuangan\Kasir\LaporanDanaDariPemanduController@index')->name('finance-accounting-menu-keuangan-kasir-laporan-dana-dari-pemandu-index');
                    Route::get('/print-pdf', 'FinanceAccounting\MenuKeuangan\Kasir\LaporanDanaDariPemanduController@printLaporanPemanduById')->name('finance-accounting-menu-keuangan-kasir-laporan-dana-dari-pemandu-print-pdf');
                });

                //KASIR
                Route::prefix('pengiriman-dana')->group(function () {
                    Route::get('/', 'FinanceAccounting\MenuKeuangan\Kasir\PengirimanDanaController@index')->name('finance-accounting-menu-keuangan-kasir-pengiriman-dana-index');
                    Route::post('/dana-dikirim', 'FinanceAccounting\MenuKeuangan\Kasir\PengirimanDanaController@DanaDikirim')->name('finance-accounting-menu-keuangan-kasir-pengiriman-dana-dikirim');
                    Route::get('/print-pdf', 'FinanceAccounting\MenuKeuangan\Kasir\PengirimanDanaController@cetakKwitansi')->name('finance-accounting-menu-keuangan-kasir-pengiriman-dana-print-kwitansi-pengajuan-dana');

                });
            });

            Route::prefix('pengajuan-dana-user')->group(function () {
                Route::get('/', 'FinanceAccounting\MenuKeuangan\User\PengajuanDanaUserController@index')->name('finance-accounting-menu-keuangan-user-pengajuan-dana-user-index');
                Route::get('/rekap', 'FinanceAccounting\MenuKeuangan\User\PengajuanDanaUserController@rekap')->name('finance-accounting-menu-keuangan-user-pengajuan-dana-user-rekap');
                Route::get('/detail-rekap', 'FinanceAccounting\MenuKeuangan\User\PengajuanDanaUserController@detailRekap')->name('finance-accounting-menu-keuangan-user-pengajuan-dana-user-detail-rekap');

//                Route::get('/status-transfer/{id}', 'FinanceAccounting\MenuKeuangan\User\PengajuanDanaUserController@statusTransfer')->name('finance-accounting-menu-keuangan-user-pengajuan-dana-user-status-transfer');
//                Route::get('/status-chas/{id}', 'FinanceAccounting\MenuKeuangan\User\PengajuanDanaUserController@statusChas')->name('finance-accounting-menu-keuangan-user-pengajuan-dana-user-status-chas');


                Route::post('/tambah-pengajuan-dana-user', 'FinanceAccounting\MenuKeuangan\User\PengajuanDanaUserController@store')->name('finance-accounting-menu-keuangan-user-pengajuan-dana-user-tambah-pengajuan-dana-user');
                Route::post('/update-pengajuan-dana-user/{id}', 'FinanceAccounting\MenuKeuangan\User\PengajuanDanaUserController@update')->name('finance-accounting-menu-keuangan-user-pengajuan-dana-user-update-pengajuan-dana-user');
                Route::delete('/delete-pengajuan-dana-user', 'FinanceAccounting\MenuKeuangan\User\PengajuanDanaUserController@delete')->name('finance-accounting-menu-keuangan-user-pengajuan-dana-user-delete-pengajuan-dana-user');


            });
            Route::prefix('laporan-nota-belanja')->group(function () {
                Route::get('/', 'FinanceAccounting\MenuKeuangan\User\LaporanNotaBelanjaController@index')->name('finance-accounting-menu-keuangan-user-laporan-nota-belanja-index');
                Route::get('/detail-nota', 'FinanceAccounting\MenuKeuangan\User\LaporanNotaBelanjaController@detailNota')->name('finance-accounting-menu-keuangan-user-laporan-nota-belanja-detail-nota');
            });


            //Administrasi
            Route::prefix('request-pengajuan-dana')->group(function () {
                Route::get('/', 'FinanceAccounting\MenuKeuangan\Pimpinan\RequestPengajuanDanaController@index')->name('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-index');
                Route::get('/detail-pengajuan/{id}', 'FinanceAccounting\MenuKeuangan\Pimpinan\RequestPengajuanDanaController@detail')->name('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-detail');

//                Route::post('/data-terpilih', 'FinanceAccounting\MenuKeuangan\Pimpinan\RequestPengajuanDanaController@terpilih')->name('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-terpilih');

                Route::get('/approval-pengajuan', 'FinanceAccounting\MenuKeuangan\Pimpinan\RequestPengajuanDanaController@approvalPengajuan')->name('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-approval-pengajuan');
                Route::get('/disetujui-pengajuan/{id}', 'FinanceAccounting\MenuKeuangan\Pimpinan\RequestPengajuanDanaController@DisetujuiPengajuanPembelian')->name('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-disetujui-pengajuan');
                Route::get('/ditolak-pengajuan/{id}', 'FinanceAccounting\MenuKeuangan\Pimpinan\RequestPengajuanDanaController@DitolakPengajuanPembelian')->name('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-ditolak-pengajuan');
                Route::post('/dana-disetuju-pimpinan', 'FinanceAccounting\MenuKeuangan\Pimpinan\RequestPengajuanDanaController@DataDisetujiPimpinan')->name('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-disetuju-pimpinan');




            });



            #region General
            #endregion
            // REGION MANAGEMNET USER
            Route::resource('management-user/role', 'ManagementUser\RoleController');
        });
    }
);
#endregion


#region AGENT
Route::get('/agent/login', function () {
    return view('agent.auth.login');
})->name('login-agent');
Route::get('/agent/dashboard', function () {
    return view('agent.dashboard.index');
})->name('dashboard-agent');


Route::resource('agent/agent-dashboard', 'Agent\DashboardAgentController');
Route::resource('agent/agent-reservation', 'Agent\ReservationController');
Route::resource('agent/report/schedule-report', 'Agent\Report\ScheduleReportController');
Route::resource('agent/report/transaction-report', 'Agent\Report\TransactionReportController');
Route::get('agent/report/detail-transaction/{booking_code}', 'Agent\Report\TransactionReportController@showDataTransaction')->name('detail-transaction-reservation');
Route::resource('agent/profile', 'Agent\ProfileController');
Route::resource('agent/agent-schedule', 'Agent\ScheduleAgentController');
#endregion



