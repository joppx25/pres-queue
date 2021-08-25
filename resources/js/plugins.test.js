const rewire = require("rewire")
const plugins = rewire("./plugins")
const addDeleteForms = plugins.__get__("addDeleteForms")
// @ponicode
describe("addDeleteForms", () => {
    test("0", () => {
        let callFunction = () => {
            addDeleteForms()
        }
    
        expect(callFunction).not.toThrow()
    })
})
