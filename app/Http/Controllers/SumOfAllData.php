<?php

namespace App\Http\Controllers;

use App\Models\Cc_Options;
use App\Models\Cc_Questions;
use App\Models\clientCategory;
use Illuminate\Http\Request;
use App\Models\clientInfo;
use App\Models\offices;
use App\Models\service1;
use App\Models\SurveyQuestion;
use Illuminate\Support\Facades\DB;

class SumOfAllData extends Controller
{
    //


    public function calculateClientSatisfaction()
    {
        $surveyData = clientInfo::all(); // Assuming you retrieve all survey data

        // Initialize counters for each category
        $stronglyAgreeCount = 0;
        $agreeCount = 0;
        $neutralCount = 0;
        $disagreeCount = 0;
        $stronglyDisagreeCount = 0;
        $notApplicableCount = 0;

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd0 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd0 == 4) {
                $agreeCount++;
            } elseif ($response->sqd0 == 3) {
                $neutralCount++;
            } elseif ($response->sqd0 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd0 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd1 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd1 == 4) {
                $agreeCount++;
            } elseif ($response->sqd1 == 3) {
                $neutralCount++;
            } elseif ($response->sqd1 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd1 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd2 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd2 == 4) {
                $agreeCount++;
            } elseif ($response->sqd2 == 3) {
                $neutralCount++;
            } elseif ($response->sqd2 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd2 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd3 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd3 == 4) {
                $agreeCount++;
            } elseif ($response->sqd3 == 3) {
                $neutralCount++;
            } elseif ($response->sqd3 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd3 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd4 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd4 == 4) {
                $agreeCount++;
            } elseif ($response->sqd4 == 3) {
                $neutralCount++;
            } elseif ($response->sqd4 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd4 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd5 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd5 == 4) {
                $agreeCount++;
            } elseif ($response->sqd5 == 3) {
                $neutralCount++;
            } elseif ($response->sqd5 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd5 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd6 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd6 == 4) {
                $agreeCount++;
            } elseif ($response->sqd6 == 3) {
                $neutralCount++;
            } elseif ($response->sqd6 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd6 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd7 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd7 == 4) {
                $agreeCount++;
            } elseif ($response->sqd7 == 3) {
                $neutralCount++;
            } elseif ($response->sqd7 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd7 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd8 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd8 == 4) {
                $agreeCount++;
            } elseif ($response->sqd8 == 3) {
                $neutralCount++;
            } elseif ($response->sqd8 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd8 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        // Return the counts
        return [
            'Strongly Agree' => $stronglyAgreeCount,
            'Agree' => $agreeCount,
            'Neutral' => $neutralCount,
            'Disagree' => $disagreeCount,
            'Strongly Disagree' => $stronglyDisagreeCount,
            'Not Applicable' => $notApplicableCount,
        ];
    }
    public function calculateTotalClient()
    {
        $totalClients = clientInfo::all()->count();
        return $totalClients;
    }
    public function calculateTotalStudent()
    {
        $totalStudents = clientInfo::where('idCategoryFK', '1')->count();
        return  $totalStudents;
    }
    public function calculateTotalPersonelAndNonPersonnel()
    {
        $totalPersonnel = clientInfo::whereIn('idCategoryFK', [2, 3])->count();
        return  $totalPersonnel;
    }
    public function calculateTotalVisitors()
    {
        $totalVisitors = clientInfo::where('idCategoryFK', '4')->count();
        return $totalVisitors;
    }
    public function calculateClientCategory()
    {
        $surveyData = clientInfo::all(); // retrieve all survey data
        // $clientCategory = clientCategory::all(); //  retrieve all  data from the table  clients Category
        // $categoryCounts = [];

        $studenCount = 0;
        $facultyCount = 0;
        $personnnelCount = 0;
        $othersCount = 0;

        foreach ($surveyData as $surveyedOffice) {
            if ($surveyedOffice->idCategoryFK == 4) {
                $othersCount++;
            } elseif ($surveyedOffice->idCategoryFK == 3) {
                $personnnelCount++;
            } elseif ($surveyedOffice->idCategoryFK == 2) {
                $facultyCount++;
            } else {
                $studenCount++;
            }
        }

        return [
            'Student' => $studenCount,
            'Faculty' => $facultyCount,
            'Personnel' => $personnnelCount,
            'Guest' => $othersCount,
        ];
    }
    public function calculatePerOfficeSurveyed()
    {
        $surveyData = clientInfo::all(); // retrieve all survey data
        $officeAvailable = offices::all();
        $officeCount = [];
        foreach ($officeAvailable as $offices) {
            $officeCount[$offices->officeAcronym] = 0;
        }

        //$office = $officeCount;
        foreach ($surveyData as $surveyed) {
            foreach ($officeAvailable as $offices) {
                if ($surveyed->idOfficeOrigin == $offices->idOffices) {
                    $officeCount[$offices->officeAcronym]++;
                }
            }
        }

        // dd($officeCount);
        return $officeCount;
    }

    // public function calculatePerOfficeServiceSurveyed()
    // {
    //     $surveyData = clientInfo::all(); //retrieve all survey data
    //     $serviceAvailable = service1::all();
    //     $serviceCount = [];
    //     foreach ($serviceAvailable as $service) {
    //         $serviceCount[$service->service_Title] = 0;
    //     }
    //     foreach ($surveyData as $surveyed) {
    //         foreach ($serviceAvailable as $service) {
    //             if ($surveyed->service_avail == $service->service_Title) {
    //                 $serviceCount[$service->service_Title]++;
    //             }
    //         }
    //     }
    //     return $serviceCount;
    // }
    public function calculateExternalSerivices()
    {
        // $surveyData = clientInfo::where('external', true)->get(); //retrieve all survey data
        $surveyData = clientInfo::all();
        $Service = service1::where('idService', '1')->get();
        $externalService = [];

        foreach ($Service as $service) {
            $externalService[$service->serviceCode] = 0;
        }

        foreach ($surveyData as $surveyed) {
            foreach ($Service as $service) {
                if ($surveyed->service_avail == $service->idServiceSpecification) {
                    $externalService[$service->serviceCode]++;
                }
            }
        }
        return  $externalService;
    }
    public function calculateInternalSerivices()
    {
        // $surveyData = clientInfo::where('external', true)->get(); //retrieve all survey data
        $surveyData = clientInfo::all();
        $Service = service1::where('idService', '2')->get();
        $internalService = [];

        foreach ($Service as $service) {
            $internalService[$service->serviceCode] = 0;
        }

        foreach ($surveyData as $surveyed) {
            foreach ($Service as $service) {
                if ($surveyed->service_avail == $service->idServiceSpecification) {
                    $internalService[$service->serviceCode]++;
                }
            }
        }
        return   $internalService;
    }

    public function getCalculatePerOfficeSurveyed($request)
    {
        // dd($request);
        $request->validate([
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
        ]);

        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])->get();
        $officeAvailable = offices::all();
        $officeCount = [];
        foreach ($officeAvailable as $offices) {
            $officeCount[$offices->officeAcronym] = 0;
        }

        //$office = $officeCount;
        foreach ($surveyData as $surveyed) {
            foreach ($officeAvailable as $offices) {
                if ($surveyed->idOfficeOrigin == $offices->officeAcronym) {
                    $officeCount[$offices->officeAcronym]++;
                }
            }
        }

        // dd($officeCount);
        return $officeCount;
    }

    public function getCalculateClientCategory($request)
    {
        // $request->validate([
        //     'date_from' => 'required|date',
        //     'date_to' => 'required|date|after_or_equal:date_from',
        // ]);

        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])->get(); // retrieve all survey data

        $studenCount = 0;
        $facultyCount = 0;
        $personnnelCount = 0;
        $othersCount = 0;


        foreach ($surveyData as $surveyedOffice) {
            if ($surveyedOffice->idCategoryFK == 4) {
                $othersCount++;
            } elseif ($surveyedOffice->idCategoryFK == 3) {
                $personnnelCount++;
            } elseif ($surveyedOffice->idCategoryFK == 2) {
                $facultyCount++;
            } else {
                $studenCount++;
            }
        }

        return [
            'Student' => $studenCount,
            'Faculty' => $facultyCount,
            'Personnel' => $personnnelCount,
            'Guest' => $othersCount,
        ];
    }

    public function getCalculateClientSatisfaction($request)
    {
        // $request->validate([
        //     'date_from' => 'required|date',
        //     'date_to' => 'required|date|after_or_equal:date_from',
        // ]);

        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])->get(); // retrieve all survey data

        // Initialize counters for each category
        $stronglyAgreeCount = 0;
        $agreeCount = 0;
        $neutralCount = 0;
        $disagreeCount = 0;
        $stronglyDisagreeCount = 0;
        $notApplicableCount = 0;

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd0 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd0 == 4) {
                $agreeCount++;
            } elseif ($response->sqd0 == 3) {
                $neutralCount++;
            } elseif ($response->sqd0 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd0 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd1 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd1 == 4) {
                $agreeCount++;
            } elseif ($response->sqd1 == 3) {
                $neutralCount++;
            } elseif ($response->sqd1 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd1 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd2 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd2 == 4) {
                $agreeCount++;
            } elseif ($response->sqd2 == 3) {
                $neutralCount++;
            } elseif ($response->sqd2 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd2 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd3 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd3 == 4) {
                $agreeCount++;
            } elseif ($response->sqd3 == 3) {
                $neutralCount++;
            } elseif ($response->sqd3 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd3 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd4 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd4 == 4) {
                $agreeCount++;
            } elseif ($response->sqd4 == 3) {
                $neutralCount++;
            } elseif ($response->sqd4 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd4 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd5 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd5 == 4) {
                $agreeCount++;
            } elseif ($response->sqd5 == 3) {
                $neutralCount++;
            } elseif ($response->sqd5 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd5 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd6 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd6 == 4) {
                $agreeCount++;
            } elseif ($response->sqd6 == 3) {
                $neutralCount++;
            } elseif ($response->sqd6 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd6 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd7 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd7 == 4) {
                $agreeCount++;
            } elseif ($response->sqd7 == 3) {
                $neutralCount++;
            } elseif ($response->sqd7 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd7 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd8 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd8 == 4) {
                $agreeCount++;
            } elseif ($response->sqd8 == 3) {
                $neutralCount++;
            } elseif ($response->sqd8 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd8 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        // Return the counts
        return [
            'Strongly Agree' => $stronglyAgreeCount,
            'Agree' => $agreeCount,
            'Neutral' => $neutralCount,
            'Disagree' => $disagreeCount,
            'Strongly Disagree' => $stronglyDisagreeCount,
            'Not Applicable' => $notApplicableCount,
        ];
    }

    public function getCalculatePerOfficeServiceSurveyed($request)
    {

        // $request->validate([
        //     'date_from' => 'required|date',
        //     'date_to' => 'required|date|after_or_equal:date_from',
        // ]);

        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])->get(); // retrieve all survey data
        // $serviceAvailable = service1::all();
        $offices = offices::all();
        $officeCount = [];


        foreach ($offices as $office) {
            $officeCount[$office->officeAcronym] = 0;
        }
        foreach ($surveyData as $surveyed) {
            foreach ($offices as $Office) {
                if ($surveyed->idOfficeOrigin == $Office->idOffices) {
                    $officeCount[$Office->officeAcronym]++;
                }
            }
        }
        return $officeCount;
    }

    public function getCalculateExternalSerivices($request)
    {

        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])->get(); // retrieve all survey data
        $Service = service1::where('idService', '1')->get();
        $externalService = [];

        foreach ($Service as $service) {
            $externalService[$service->serviceCode] = 0;
        }

        foreach ($surveyData as $surveyed) {
            foreach ($Service as $service) {
                if ($surveyed->service_avail == $service->idServiceSpecification) {
                    $externalService[$service->serviceCode]++;
                }
            }
        }
        return  $externalService;
    }
    public function getCalculateInternalSerivices($request)
    {
        // $request->validate([
        //     'date_from' => 'required|date',
        //     'date_to' => 'required|date|after_or_equal:date_from',
        // ]);

        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])->get(); // retrieve all survey data
        $Service = service1::where('idService', '2')->get();
        $internalService = [];

        foreach ($Service as $service) {
            $internalService[$service->serviceCode] = 0;
        }

        foreach ($surveyData as $surveyed) {
            foreach ($Service as $service) {
                if ($surveyed->service_avail == $service->idServiceSpecification) {
                    $internalService[$service->serviceCode]++;
                }
            }
        }
        return  $internalService;
    }

    public function getAllTotalServiceResult($request)
    {

        $dateFrom = $request->input('date_From');
        $dateTo = $request->input('date_To');

        //total responses

        $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])->get(); // retrieve all survey data
        $services = service1::all();

        $servicesData = [];

        // foreach ($services as $service) {
        //     $servicesData[$service->serviceTitle] = 0;
        // }

        // //Count per services  each offices
        // foreach ($surveyData as $surveyed) {
        //     foreach ($services as $service) {
        //         if ($surveyed->service_avail == $service->idServiceSpecification) {
        //             $servicesData[$service->serviceTitle]++;
        //         }
        //     }
        // }

        foreach ($surveyData as $surveyed) {
            foreach ($services as $service) {
                if ($surveyed->service_avail == $service->idServiceSpecification) {
                    $serviceTitle = $service->serviceTitle;

                    if (!isset($servicesData[$serviceTitle])) {
                        $servicesData[$serviceTitle] = 0;
                    }

                    $servicesData[$serviceTitle]++;
                }
            }
        }

        // Calculate the total sum of services
        $totalServices = array_sum($servicesData); //will be retrieve
        $totalServiceTransaction = array_sum($servicesData); //will be retrieve

        $divideTheTransactionAndResponse =   round($totalServices /    $totalServiceTransaction);


        $multiplyByHundred = 100 *  $divideTheTransactionAndResponse; //will be retrieve

        return [
            'totalServices' => $totalServices,
            'totalServiceTransaction' => $totalServiceTransaction,
            'multiplyByHundred' => $multiplyByHundred,
            // 'serviceDataWithCode' => $serviceDataWithCode,
            'servicesData' => $servicesData,
        ];
    }

    public function getAllTheCcResult($request)
    {

        $dateFrom = $request->input('date_From');
        $dateTo = $request->input('date_To');

        //total responses

        $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])->get(); // retrieve all survey data
        $CcOptions = Cc_Options::all();

        $cc1Data = [];
        $cc2Data = [];
        $cc3Data = [];

        foreach ($CcOptions as $CcOption) {
            if ($CcOption->option_text != null) {
                if ($CcOption->table_cc_question_id == 1) {
                    $cc1Data[$CcOption->option_text] = 0;
                }
                if ($CcOption->table_cc_question_id == 2) {
                    $cc2Data[$CcOption->option_text] = 0;
                }
                if ($CcOption->table_cc_question_id == 3) {
                    $cc3Data[$CcOption->option_text] = 0;
                }
            }
        }

        foreach ($surveyData as $survey) {
            foreach ($CcOptions as $CcOption) {
                if ($survey->cc1 == $CcOption->id) {
                    $cc1Data[$CcOption->option_text]++;
                }
                if ($survey->cc2 == $CcOption->id) {
                    $cc2Data[$CcOption->option_text]++;
                }
                if ($survey->cc3 == $CcOption->id) {
                    $cc3Data[$CcOption->option_text]++;
                }
            }
        }

        // Get separate sums for cc1, cc2, and cc3
        $totalCc1Response = array_sum($cc1Data);
        $totalCc2Response = array_sum($cc2Data);
        $totalCc3Response = array_sum($cc3Data);
        // Calculate percentages
        $totalResponses = $totalCc1Response + $totalCc2Response + $totalCc3Response;

        $cc1Percentages = $this->calculatePercentages($cc1Data, $totalResponses);
        $cc2Percentages = $this->calculatePercentages($cc2Data, $totalResponses);
        $cc3Percentages = $this->calculatePercentages($cc3Data, $totalResponses);
        // dd($cc1Percentages);

        return [
            'cc1Data' => $cc1Data,
            'cc1Percentage' => $cc1Percentages,

            'cc2Data' => $cc2Data,
            'cc2Percentage' => $cc2Percentages,

            'cc3Data' => $cc3Data,
            'cc3Percentage' => $cc3Percentages,
        ];
    }

    // Helper function to calculate percentages
    private function calculatePercentages($data, $totalResponses)
    {
        $percentages = [];
        foreach ($data as $option => $count) {
            $percentages[$option] = round(($count * 100) / $totalResponses);
        }
        return $percentages;
    }
    // public function getAllTheCcResult($request)
    // {

    //     // $dateFrom = $request->input('date_From');
    //     // $dateTo = $request->input('date_To');

    //     // //total responses

    //     // $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])->get(); // retrieve all survey data
    //     // $CcOptions = Cc_Options::all();

    //     // $OptionData = [];

    //     // foreach ($CcOptions as $CcOption) {
    //     //     if ($CcOption->option_text != null) {
    //     //         $OptionData[$CcOption->option_text] = 0;
    //     //     }
    //     // }

    //     // foreach ($surveyData as $survey) {
    //     //     foreach ($CcOptions as $CcOption) {
    //     //         if ($survey->cc1 == $CcOption->id) {
    //     //             $OptionData[$CcOption->option_text]++;
    //     //         }
    //     //         if ($survey->cc2 == $CcOption->id) {
    //     //             $OptionData[$CcOption->option_text]++;
    //     //         }
    //     //         if ($survey->cc3 == $CcOption->id) {
    //     //             $OptionData[$CcOption->option_text]++;
    //     //         }
    //     //     }
    //     // }


    //     // dd($OptionData);
    // }

    public function getTheSqdQuestion()
    {
        $SQDquestions = SurveyQuestion::all();
        // $sqdQuestion =   $SQDquestions->questions;
        return   $SQDquestions;
    }
    // public function getAllSQDResult($request)
    // {
    //     $dateFrom = $request->input('date_From');
    //     $dateTo = $request->input('date_To');

    //     //total responses

    //     // $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])
    //     //     ->get(); // retrieve all survey data
    //     $SQDquestions = SurveyQuestion::all();
    //     $Questions = [];

    //     $dateRange = [$dateFrom, $dateTo];
    //     $sqdValues = [0, 1, 2, 3, 4, 5];
    //     $responsivenessCounts = [];
    //     $reliabilityCounts = [];
    //     $accessAndfacilitiesCounts = [];
    //     $communicationCounts = [];
    //     $costCounts = [];
    //     $integrityCounts = [];
    //     $assuranceCounts = [];
    //     $outcomeCounts = [];
    //     $overallCounts = [];

    //     foreach ($SQDquestions as $question) {
    //         $Questions[$question->questions] = 0;
    //     }



    //     foreach ($sqdValues as $value) {
    //         $responsivenessCounts[] = DB::table('table_client_survey_information')
    //             ->whereBetween('created_at', $dateRange)
    //             ->where('sqd0',  $value)
    //             ->count();
    //     }

    //     foreach ($sqdValues as $value) {
    //         $reliabilityCounts[] = DB::table('table_client_survey_information')
    //             ->whereBetween('created_at', $dateRange)
    //             ->where('sqd1',  $value)
    //             ->count();
    //     }
    //     foreach ($sqdValues as $value) {
    //         $accessAndfacilitiesCounts[] = DB::table('table_client_survey_information')
    //             ->whereBetween('created_at', $dateRange)
    //             ->where('sqd2',  $value)
    //             ->count();
    //     }
    //     foreach ($sqdValues as $value) {
    //         $communicationCounts[] = DB::table('table_client_survey_information')
    //             ->whereBetween('created_at', $dateRange)
    //             ->where('sqd3',  $value)
    //             ->count();
    //     }
    //     foreach ($sqdValues as $value) {
    //         $costCounts[] = DB::table('table_client_survey_information')
    //             ->whereBetween('created_at', $dateRange)
    //             ->where('sqd4',  $value)
    //             ->count();
    //     }
    //     foreach ($sqdValues as $value) {
    //         $integrityCounts[] = DB::table('table_client_survey_information')
    //             ->whereBetween('created_at', $dateRange)
    //             ->where('sqd5',  $value)
    //             ->count();
    //     }
    //     foreach ($sqdValues as $value) {
    //         $assuranceCounts[] = DB::table('table_client_survey_information')
    //             ->whereBetween('created_at', $dateRange)
    //             ->where('sqd6',  $value)
    //             ->count();
    //     }
    //     foreach ($sqdValues as $value) {
    //         $outcomeCounts[] = DB::table('table_client_survey_information')
    //             ->whereBetween('created_at', $dateRange)
    //             ->where('sqd7',  $value)
    //             ->count();
    //     }
    //     foreach ($sqdValues as $value) {
    //         $overallCounts[] = DB::table('table_client_survey_information')
    //             ->whereBetween('created_at', $dateRange)
    //             ->where('sqd8',  $value)
    //             ->count();
    //     }
    //     // ->sum(DB::raw('sqd0 * 5'));

    //     $Sqd0 = [];

    //     dd($integrityCounts);
    // }
    // public function getAllSQDResult($request)
    // {
    //     $dateFrom = $request->input('date_From');
    //     $dateTo = $request->input('date_To');

    //     // Retrieve all survey questions
    //     $SQDquestions = SurveyQuestion::all();

    //     $Questions = [];

    //     $dateRange = [$dateFrom, $dateTo];
    //     $sqdValues = [0, 1, 2, 3, 4, 5];
    //     $questionCounts = [];

    //     foreach ($SQDquestions as $question) {
    //         $Questions[$question->questions] = 0;
    //     }

    //     $sqdFields = ['sqd0', 'sqd1', 'sqd2', 'sqd3', 'sqd4', 'sqd5', 'sqd6', 'sqd7', 'sqd8'];
    //     // $sqdFields =   $questionCounts;

    //     foreach ($sqdFields as $field) {
    //         $counts = [];
    //         foreach ($sqdValues as $value) {
    //             $counts[] = DB::table('table_client_survey_information')
    //                 ->whereBetween('created_at', $dateRange)
    //                 ->where($field, $value)
    //                 ->count();
    //         }
    //         $questionCounts[$field] = $counts;
    //     }

    //     dd($questionCounts);
    // }

    public function getAllSQDResult($request)
    {
        $dateFrom = $request->input('date_From');
        $dateTo = $request->input('date_To');

        // Retrieve all survey questions
        $SQDquestions = SurveyQuestion::all();

        $dateRange = [$dateFrom, $dateTo];
        $sqdValues = [0, 1, 2, 3, 4, 5];
        $questionCounts = [];

        foreach ($SQDquestions as $question) {
            $questionCounts[$question->questions] = [];
            foreach ($sqdValues as $value) {
                $questionCounts[$question->questions][$value] = DB::table('table_client_survey_information')
                    ->whereBetween('created_at', $dateRange)
                    ->where('sqd' . $question->id, $value)
                    ->count();
            }
        }

        // dd($questionCounts);
        return response()->json($questionCounts);
    }
}
