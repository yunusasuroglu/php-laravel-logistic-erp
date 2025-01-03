<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <title>{{$shipment->s_code}}</title>
    <style>
        .page-break {
            page-break-before: always;
        }
        body {
            font-family: 'DejaVu Sans', sans-serif !important;
            text-align: center;
            color: #777;
        }
        
        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }
        
        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }
        
        body a {
            color: #06f;
        }
        .heading{
            background-color: #ddd;
        }
        .invoice-box {
            max-width:1000px;
            max-height: 1000px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 12x;
            line-height: 24px;
            font-family: 'DejaVu Sans', sans-serif !important;
            color: #555;
        }
        
        table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }
        
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        
        table tr td:nth-child(2) {
            text-align: right;
        }
        
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box ul li {
            margin-top: 7px;
        }
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        
        .invoice-box table tr.heading td {
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
        
        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }
            
            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table>
            <tr>
                <td>
                    <b style="border-bottom: 1px solid black;">
                        <h2 style="margin: 0px; border-bottom: 1px solid #ddd; padding: 4px;">Kunde</h2>
                    </b>
                    <br>
                </td>
            </tr>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td style="font-size: 12px;">
                                <b>{{$shipment->customer['name']}}</b><br/>
                                {{$shipment->customer['street']}}, {{$shipment->customer['city']}}, {{$shipment->customer['country']}}, {{$shipment->customer['zip_code']}}<br/>
                                {{$shipment->customer['phone']}} - {{$shipment->customer['email']}} <br> 
                                Umgekehrte Änderung: 
                                @if ($shipment->customer['reverse_charge'] == 2)
                                <span class="badge ms-3 bg-success-transparent">Aktiv</span>
                                @else
                                <span class="badge ms-3 bg-info-transparent">Pasiv</span>
                                @endif
                                <br><br><br>
                                <h4 style="font-size: 24px; color: #00ab41;"><b>Sendung #</b>{{$shipment->s_code}} <img style="width: 20px;" src="https://cdn-icons-png.flaticon.com/512/5610/5610944.png?ga=GA1.1.1188944632.1700399912&" alt=""></h4>
                                <td style="font-size: 12px;">
                                    <b>{{$shipment->author_company['name']}}</b><br/>
                                    Steuernummer: {{$shipment->author_company['tax_number']}}<br/>
                                    {{$shipment->author_company['city']}} / {{$shipment->author_company['country']}}<br/>
                                    {{$shipment->author_company['email']}} | {{$shipment->author_company['phone']}} <br> <br><br><br>
                                    <span style="font-size: 13px; padding: 7px; margin: 6px; margin-top: 10px; border-bottom: 1px solid #ddd;">Schaffung: {{ $shipment->created_at->format('d/m/Y')}}</span> <br><br>
                                    <span style="font-size: 13px; padding: 7px; margin: 6px; margin-top: 10px; border-bottom: 1px solid #ddd;">Bearbeitung: {{ $shipment->updated_at->format('d/m/Y')}}</span> <br><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <p style="text-align: left; font-size: 12px;"><b>Adressen Hochladen</b></p>
            <table>
                <tr class="heading">
                    <td style="font-size: 8px;">Firma</td>
                    <td style="font-size: 8px;">İsim</td>
                    <td style="font-size: 8px;">Telefon</td>
                    <td style="font-size: 8px;">Referans</td>
                    <td style="font-size: 8px;">Verlade Datum</td>
                    <td style="font-size: 8px;">Zeitrahmen</td>
                    <td style="font-size: 8px;">Adresse</td>
                    <td style="font-size: 8px;">Details</td>
                </tr>
                
                @foreach ($shipment->upload_info as $upload_info)
                <tr class="item">
                    <td style="font-size: 8px;">{{$upload_info['company_name']}}</td>
                    <td style="font-size: 8px;">{{$upload_info['name']}}</td>
                    <td style="font-size: 8px;">{{$upload_info['phone']}}</td>
                    <td style="font-size: 8px;">{{$upload_info['ref_no']}}</td>
                    <td style="font-size: 8px;">{{$upload_info['upload_date']}}</td>
                    <td style="font-size: 8px;">{{$upload_info['time_start']}} - {{$upload_info['time_end']}}</td>
                    <td style="font-size: 8px;">{{$upload_info['street']}}, {{$upload_info['city']}}, {{$upload_info['country']}}, {{$upload_info['zip_code']}}</td>
                    <td style="font-size: 8px;">{{$upload_info['content']}}</td>
                </tr>
                @endforeach
                <tr class="item">
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                </tr>
                <tr class="item">
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                </tr>
            </table>
            <p style="text-align: left; font-size: 12px;"><b>Lieferadressen</b></p>
            <table style="margin-bottom: 5%;">
                <tr class="heading">
                    <td style="font-size: 8px;">Firma</td>
                    <td style="font-size: 8px;">İsim</td>
                    <td style="font-size: 8px;">Telefon</td>
                    <td style="font-size: 8px;">Referans</td>
                    <td style="font-size: 8px;">Verlade Datum</td>
                    <td style="font-size: 8px;">Zeitrahmen</td>
                    <td style="font-size: 8px;">Adresse</td>
                    <td style="font-size: 8px;">Details</td>
                </tr>
                @foreach ($shipment->delivery_info as $delivery_info)
                <tr class="item">
                    <td style="font-size: 8px;">{{$delivery_info['company_name']}}</td>
                    <td style="font-size: 8px;">{{$delivery_info['name']}}</td>
                    <td style="font-size: 8px;">{{$delivery_info['phone']}}</td>
                    <td style="font-size: 8px;">{{$delivery_info['ref_no']}}</td>
                    <td style="font-size: 8px;">{{$delivery_info['upload_date']}}</td>
                    <td style="font-size: 8px;">{{$delivery_info['time_start']}} - {{$delivery_info['time_end']}}</td>
                    <td style="font-size: 8px;">{{$delivery_info['street']}}, {{$delivery_info['city']}}, {{$delivery_info['country']}}, {{$delivery_info['zip_code']}}</td>
                    <td style="font-size: 8px;">{{$delivery_info['content']}}</td>
                </tr>
                @endforeach
                <tr style="font-size: 14px;" class="total">
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @if ($shipment->vat != 0)
                <tr style="font-size: 11px; margin: 0px; padding: 0px; line-height: 12px;" class="total">
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;"><b>MwSt:</b></td>
                    <td><b>{{$shipment->price * $shipment->vat}} € <small style="color: #06f ">{{$shipment->vat}}%</small></b></td>
                </tr>
                @endif
                <tr style="font-size: 11px; margin: 0px; padding: 0px; line-height: 12px;" class="total">
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;"><b>Versandbetrag:</b></td>
                    <td><b>{{$shipment->price}} €</b></td>
                </tr>
                <tr style="font-size: 11px; margin: 0px; padding: 0px; line-height: 12px;" class="total">
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;"><b>Gesamtmenge:</b></td>
                    @if ($shipment->vat != 0)
                    <td><b>{{$shipment->price + $shipment->price * $shipment->vat}} €</b></td>
                    @else
                    <td><b>{{$shipment->price}} €</b></td>
                    @endif
                </tr>
            </table>
            <div class="footer">
                <table style="height: auto;">
                    <tr>
                        <td style="font-size: 11px; line-height: 14px; text-align: left;">
                            <span style="color: #0c2ac0"><b>{{$shipment->author_company['name']}}</b></span> <br>
                            {{$shipment->author_company['street']}}, {{$shipment->author_company['zip_code']}}, {{$shipment->author_company['city']}} <br>
                            <b>T</b> {{$shipment->author_company['phone']}}  <br>
                            <b>E-Mail</b> <a href="">{{$shipment->author_company['email']}}</a>, <br>
                            <b>Web</b> oeztep-transporte.de <br>
                            
                        </td>
                        <td style="font-size: 11px; line-height: 14px; text-align: left;">
                            <b>IBAN</b> {{$shipment->author_company['iban']}} <br>
                            <b>BIC</b> {{$shipment->author_company['bic']}} <b>Bank</b> Sparkasse Essen  <br>
                            <b>StNr</b> {{$shipment->author_company['stnr']}} <br>
                            <b>Ust-Id Nr.</b> {{$shipment->author_company['ust_id_nr']}}<br>
                        </td>
                        <td style="font-size: 11px; line-height: 14px; text-align: left;">
                            <b>HRB</b> {{$shipment->author_company['hrb']}}<br>
                            <b>Registergericht</b> {{$shipment->author_company['registry_court']}} <br>
                            <b>Geschäftsführer</b><br>
                            {{$shipment->author_company['general_manager']}} <br>
                            
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="page-break"></div>
        <!-- Z -->
        <div class="invoice-box" style="text-align: left; font-size: 9px;">
            <p style="text-decoration: underline; margin: 0; padding: 0;"><b>Allgemeine Vertragsbedingungen:</b></p>
            <small>Vielen Dank für die Durchführung unseres Transportauftrags. Folgend lesen Sie unsere Vertragsbedingungen:</small> <br>
            <small style="text-decoration: underline;"><b>Geltungsbereich:</b></small>
            <ul style="line-height: 9px">
                <li>Wir arbeiten ausschließlich auf Grundlage der Allgemeinen Deutschen Spediteurbedingungen 2017 (ADSp 2017) und
                    für grenzüberschreitende Beförderungen auf Grundlage der Bestimmungen des Übereinkommens über den
                    Beförderungsvertrag im internationalen Straßengüterverkehr (CMR).</li>
                </ul>
                <small style="text-decoration: underline;"><b>Rechnung und Ablieferbelege::</b></small>
                <ul style="line-height: 9px">
                    <li>
                        <b>
                            Die Rechnung und Ablieferbelege können als jeweils einzelne PDF-Datei per E-Mail an
                            <a style="color: #06f;" href="mailto:{{$shipment->author_company['email']}}">{{$shipment->author_company['email']}}</a> gesendet werden. Im Betreff ist unsere Auftragsnummer
                            anzugeben.
                        </b>
                    </li>
                    <li>
                        Das Zahlungsziel beträgt 45 Tage nach Eingang der Rechnung, sowie der vollständigen Ablieferbelege.
                    </li>
                </ul>
                <small style="text-decoration: underline;"><b>Referenzen:</b></small>
                <ul style="line-height: 9px">
                    <li>
                        Falls es keine Ladereferenz gibt, dann gilt immer: „Laden im Auftrag von {{$shipment->author_company['name']}}“
                    </li>
                    <li>
                        Bei Verzögerungen oder Hindernisse sowohl zur Ladestelle als auch zur Entladestelle sind wir umgehend zuinformieren.
                    </li>
                </ul>
                <small style="text-decoration: underline;"><b>Wartezeit:</b></small>
                <ul style="line-height: 9px">
                    <li>
                        3 Stunden sind jeweils für die Be- und Entladung im Frachtpreis inkludiert.
                    </li>
                    <li>
                        Für jede weitere angefangene halbe Stunde werden 15€ vergütet.
                    </li>
                </ul>
                <small style="text-decoration: underline;"><b>Palettentausch:</b></small>
                <ul style="line-height: 9px">
                    <li>
                        Europaletten sind Zug um Zug zu tauschen, es sei denn anderes wurde vorher mit uns besprochen.
                    </li>
                    <li>
                        Eine Rückführung der Europaletten ist nach Absprache möglich. Sollte dies nicht innerhalb von 21 Tagen geschehen, behalten wir uns 15€ pro Palette zu berechnen und gegeben falls auch von der Fracht abzuziehen.
                    </li>
                    <li>
                        Ist kein Tausch vereinbart worden, jedoch die Paletten trotzdem getauscht wurden und der Empfänger keine Tauschpaletten hat, dann bin ich nicht dafür verantwortlich.
                    </li>
                </ul>
                <small style="text-decoration: underline;"><b>Auftragnehmer:</b></small>
                <ul style="line-height: 9px">
                    <li>
                        Der AN ist verpflichtet, dafür Sorge zu tragen, dass die eingesetzten Fahrzeuge in einem technisch einwandfreien,
                        sauberen und verkehrssicheren Zustand sind und dass sie für die im Transportauftrag vorgesehen Güter geeignet
                        und ordnungsgemäß ausgestattet sind. Funktionsfähiges Ladungssicherungsmaterial und persönliche
                        Schutzausrüstung (“PSA"), ggfs. nach den speziellen Anforderungen des zu ladenden Gutes, hat der AN stets in
                        ausreichender Menge mitzuführen.
                    </li>
                    <li>
                        Der Ausfall des vorgesehenen oder des eingesetzten Fahrzeuges entbindet den AN nicht von der Verpflichtung zur
                        Erfüllung des Transportauftrages. Der AN ist in diesem Fall verpflichtet, ein geeignetes Ersatzfahrzeug zu stellen,
                        auch wenn er den Ausfall nicht zu vertreten hat. Die für die Beladung und Übernahme der Güter vereinbarten Termine
                        sind durch den AN strikt einzuhalten. Der Auftraggeber ist berechtigt, nach Ablauf einer dem AN gesetzten
                        angemessenen Frist ein Ersatzfahrzeug zu stellen. Die hierfür entstehenden Kosten stellt der Auftraggeber dem AN in
                        Rechnung.
                    </li>
                    <li>
                        Bis zur vollständigen Erledigung des Auftrags muss die Disposition des AN für den Auftraggeber jederzeit telefonisch
                        erreichbar sein.
                    </li>
                </ul>
                <small style="text-decoration: underline;"><b>Kundenschutz:</b></small>
                <ul style="line-height: 9px">
                    <li>
                        Kundenschutz gilt ausdrücklich als vereinbart, auch über den Auftrag hinaus. Bei Nichteinhaltung wird eine
                        Vertragsstrafe in Höhe von 10.000€ fällig.
                    </li>
                </ul>
                <small style="text-decoration: underline;"><b>Haftungsgrenzen / Versicherung:</b></small>
                <ul style="line-height: 9px">
                    <li>
                        Die Regelhaftungsgrenzen im nationalen Frachtbereich werden gemäß § 449 HGB abweichend von § 431
                        HGB bei Güterschaden und Verlustfällen auf 40 Sonderziehungsrechte (SZR) je kg des Rohgewichts der Sendung
                        festgesetzt. Für den internationalen Bereich gelten gesetzlich die CMR.
                    </li>
                    <li>
                        Der Auftragnehmer muss über den erforderlichen Versicherungsschutz einer Verkehrshaftungsversicherung gem.
                        HGB mit 40 SZR, sowie gem. CMR, sowie über eine Betriebshaftpflichtversicherung, mit einer Deckungssumme von
                        jeweils mindestens € 2,0 Mio. verfügen.
                    </li>
                    <li>
                        Der Auftrag gilt 15 Minuten nach Erhalt automatisch als bestätigt und Sie erklären sich mit allen Bedingungen einverstanden.
                    </li>
                    <li>
                        Gerichtsstand Essen
                    </li>
                </ul>
                
                <table>
                    <tr>
                        <th>Frachtrate: </th>
                        @if ($shipment->vat != 0)
                        <th>{{$shipment->price + $shipment->price * $shipment->vat}} EUR netto zzgl. Umsatzsteuer</th>
                        @else
                        <th>{{$shipment->price}} EUR netto zzgl. Umsatzsteuer</th>
                        @endif
                    </tr>
                </table>
            </div>
        </body>
        </html>