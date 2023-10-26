const {Builder, By, Key, util} = require("selenium-webdriver");
async function example(){
    let driver = await new Builder().forBrowser("firefox").build();
    await driver.get("http://localhost/aplicacionwebmesadeayuda/index.html");
    await driver.findElement(By.name("login")).sendKeys("director",Key.RETURN);
    await driver.findElement(By.name("password")).sendKeys("jose",Key.RETURN);
    const btnLogion= driver.findElement(By.className("fadeIn fourth"));
    btnLogin.click();
    const spanElement = await driver.findElement(By.xpath("//span[contains(@class, 'fas fa-database')]"));
    await spanElement.click();
    const spanElement2 = await driver.findElement(By.xpath("//span[contains(@class, 'fas fa-laptop')]"));
    await spanElement.click();
    const spanElement3 = await driver.findElement(By.xpath("//span[contains(@class, 'fas fa-digital-tachograph')]"));
    await spanElement.click();
    const spanElement4 = await driver.findElement(By.xpath("//span[contains(@class, 'fas fa-file-archive')]"));
    await spanElement.click();
     const btnAgregar= driver.findElement(By.className("btn btn-primary"));
     btnAgregar.click();
     let llenar;
     for (let index = 0; index < 5; index++) {
        const nombreEventoInput = await driver.findElement(By.id('nombre_evento')); 
        await nombreEventoInput.sendKeys('reunion presencial');
        const horaInicioInput = await driver.findElement(By.id('hora_inicio')); 
        await horaInicioInput.sendKeys('02:45:00');
        const horaFinalInput = await driver.findElement(By.id('hora_final')); 
        await horaFinalInput.sendKeys('06:45:00');
        const fechaInput = await driver.findElement(By.id('fecha')); 
        await fechaInput.sendKeys('12/11/2023');
        const btnGuardar= driver.findElement(By.className("btn btn-purple"));
        btnGuardar.click();
        btnGuardar.submit();
        llenar+1;
        
     }
     const btnActualizar= driver.findElement(By.className("btn btn-warning"));
     btnActualizar.click();
     let llenar2;
     for (let index = 0; index < 5; index++) {
        const nombreEventoInput = await driver.findElement(By.id('nombre_evento')); 
        await nombreEventoInput.clear();
        await nombreEventoInput.sendKeys('reunion');
        const horaInicioInput = await driver.findElement(By.id('hora_inicio')); 
        await horaInicioInput.clear();
        await horaInicioInput.sendKeys('02:45:00');
        const horaFinalInput = await driver.findElement(By.id('hora_final')); 
        await horaFinalInput.clear();
        await horaFinalInput.sendKeys('06:45:00');
        const fechaInput = await driver.findElement(By.id('fecha')); 
        await fechaInput.clear();
        await fechaInput.sendKeys('12/11/2023');
        const btnGuardar= driver.findElement(By.className("btn btn-purple"));
        btnGuardar.click();
        btnGuardar.submit();
        llenar2 +1;
        
     }
     const btnEliminar= driver.findElement(By.className("btn btn-danger"));
     btnEliminar.click();
     const btnEliminar2= driver.findElement(By.className("swal2 confirm"));
     btnEliminar2.click();
}
example();