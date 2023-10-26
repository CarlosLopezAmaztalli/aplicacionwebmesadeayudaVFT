const {Builder, By, Key, util} = require("selenium-webdriver");
async function example(){
    let driver = await new Builder().forBrowser("firefox").build();
    await driver.get("https://mesa.computo12.com.mx/index.html");
    await driver.findElement(By.name("login")).sendKeys("admin",Key.RETURN);
    await driver.findElement(By.name("password")).sendKeys("admin",Key.RETURN);
}
example();