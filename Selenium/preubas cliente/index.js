const {Builder, By, Key, util} = require("selenium-webdriver");
async function example(){
    let driver = await new Builder().forBrowser("firefox").build();
    await driver.get("http://localhost/aplicacionwebmesadeayuda/index.html");
    await driver.findElement(By.name("login")).sendKeys("cliente",Key.RETURN);
    await driver.findElement(By.name("password")).sendKeys("facultad",Key.RETURN);
    const btnLogion= driver.findElement(By.className("fadeIn fourth"));
    btnLogin.click();
    const spanElement = await driver.findElement(By.xpath("//span[contains(@class, 'fas fa-assystive-listening-systems')]"));
    await spanElement.click();
    const spanElement2 = await driver.findElement(By.xpath("//span[contains(@class, 'fas fa-filw-alt')]"));
    await spanElement.click();
    const btnCrear= driver.findElement(By.className("btn btn-primary"));
    btnCrear.click();
    const selectedOptionList = await select.getAllSelectedOptions();
    await select.selectByVisibleText('aplicacion');
    const descripcionInput = await driver.findElement(By.id('descripcion')); 
        await descripcionInput.sendKeys('necesito ayuda');
        const btnAgregar= driver.findElement(By.className("btn btn-primary"));
        btnAgregar.click();
}
example();