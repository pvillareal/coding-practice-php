async function test(dId, disease){
    let url = "https://jsonmock.hackerrank.com/api/medical_records?page=";
    let pulseTotal = 0;
    let pulseCount = 0;
    for (let i = 1; i <= 10; i++) {
        let pageUrl = url + i;
        let fetchData = await fetch(pageUrl);
        let response = await fetchData.json();
        for (let d = 0; d < 10; d++) {

            let doctor = response.data[d]?.doctor?.id;
            let diagnosis = response.data[d]?.diagnosis?.name;

            if (doctor === dId && diagnosis === disease) {
                pulseTotal = pulseTotal + response.data[d]?.vitals?.pulse;
                pulseCount++;
            }
        }
    }
    let average = ~~Math.trunc(pulseTotal / pulseCount);
    console.log(average);
    return average;
}

test(1, "Pulmonary embolism");