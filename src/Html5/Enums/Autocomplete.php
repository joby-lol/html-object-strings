<?php

namespace ByJoby\HTML\Html5\Enums;

/**
 * The HTML autocomplete attribute lets web developers specify what if any
 * permission the user agent has to provide automated assistance in filling out
 * form field values, as well as guidance to the browser as to the type of
 * information expected in the field.
 *
 * It is available on <input> elements that take a text or numeric value as
 * input, <textarea> elements, <select> elements, and <form> elements.
 *
 * The source of the suggested values is generally up to the browser; typically
 * values come from past values entered by the user, but they may also come from
 * pre-configured values. For instance, a browser might let the user save their
 * name, address, phone number, and email addresses for autocomplete purposes.
 * Perhaps the browser offers the ability to save encrypted credit card
 * information, for autocompletion following an authentication procedure.
 *
 * If an <input>, <select> or <textarea> element has no autocomplete attribute,
 * then browsers use the autocomplete attribute of the element's form owner,
 * which is either the <form> element that the element is a descendant of, or
 * the <form> whose id is specified by the form attribute of the element (see
 * the <form> autocomplete attribute).
 *
 * Description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/autocomplete
 */
enum Autocomplete: string
{
    /**
     * The browser is not permitted to automatically enter or select a value for
     * this field. It is possible that the document or application provides its
     * own autocomplete feature, or that security concerns require that the
     * field's value not be automatically entered.
     */
    case off = "off";
    /**
     * The browser is allowed to automatically complete the input. No guidance
     * is provided as to the type of data expected in the field, so the browser
     * may use its own judgement.
     */
    case on = "on";
    /**
     * The field expects the value to be a person's full name. Using "name"
     * rather than breaking the name down into its components is generally
     * preferred because it avoids dealing with the wide diversity of human
     * names and how they are structured; however, you can use a more specific
     * name_* value if you do need to break the name down into its components:
     */
    case name = "name";
    /**
     * The prefix or title, such as "Mrs.", "Mr.", "Miss", "Ms.", "Dr.", or
     * "Mlle.".
     */
    case name_honorific = "honorific-prefix";
    /**
     * The given (or "first") name.
     */
    case name_first = "given-name";
    /**
     * The middle name.
     */
    case name_middle = "additional-name";
    /**
     * The family (or "last") name.
     */
    case name_last = "family-name";
    /**
     * The suffix, such as "Jr.", "B.Sc.", "PhD.", "MBASW", or "IV".
     */
    case name_suffix = "honorific-suffix";
    /**
     * A nickname or handle.
     */
    case nickname = "nickname";
    /**
     * An email address.
     */
    case email = "email";
    /**
     * A username or account name.
     */
    case username = "username";
    /**
     * The user's current password.
     */
    case password = "current-password";
    /**
     * A new password. When creating a new account or changing passwords, this
     * should be used for an "Enter your new password" or "Confirm new password"
     * field, as opposed to a general "Enter your current password" field that
     * might be present. This may be used by the browser both to avoid
     * accidentally filling in an existing password and to offer assistance in
     * creating a secure password.
     */
    case password_new = "new-password";
    /**
     * A one-time password (OTP) for verifying user information, most commonly a
     * phone number used as an additional factor in a sign-in flow.
     */
    case otp = "one-time-code";
    /**
     * A job title, or the title a person has within an organization, such as
     * "Senior Technical Writer", "President", or "Assistant Troop Leader".
     */
    case jobTitle = "organization-title";
    /**
     * A company or organization name, such as "Acme Widget Company" or "Girl
     * Scouts of America".
     */
    case organization = "organization";
    /**
     * A street address. This can be multiple lines of text, and should fully
     * identify the location of the address within its second administrative
     * level (typically a city or town), but should not include the city name,
     * ZIP or postal code, or country name.
     */
    case streetAddressCombined = "street-address";
    /**
     * The street address to send a product. This can be combined with other
     * tokens, such as "shipping street-address" and "shipping address-level2".
     */
    case shipping = "shipping";
    /**
     * The street address to associate with the form of payment used. This can
     * be combined with other tokens, such as "billing street-address" and
     * "billing address-level2".
     */
    case billing = "billing";
    /**
     * The first individual line of the street address. This should only be
     * present if the "street-address" is not present.
     */
    case streetAddress1 = "address-line1";
    /**
     * The second individual line of the street address. This should only be
     * present if the "street-address" is not present.
     */
    case streetAddress2 = "address-line2";
    /**
     * The third individual line of the street address. This should only be
     * present if the "street-address" is not present.
     */
    case streetAddress3 = "address-line3";
    /**
     * The first administrative level in the address. This is typically the
     * province in which the address is located. In the United States, this
     * would be the state. In Switzerland, the canton. In the United Kingdom,
     * the post town.
     */
    case addressLevel1 = "address-level1";
    /**
     * The second administrative level, in addresses with at least two of them.
     * In countries with two administrative levels, this would typically be the
     * city, town, village, or other locality in which the address is located.
     */
    case addressLevel2 = "address-level2";
    /**
     * The third administrative level, in addresses with at least three
     * administrative levels.
     */
    case addressLevel3 = "address-level3";
    /**
     * The fourth administrative level, in addresses with at least four
     * administrative levels.
     */
    case addressLevel4 = "address-level4";
    /**
     * A country or territory code.
     */
    case countryCode = "country";
    /**
     * A country or territory name.
     */
    case country = "country-name";
    /**
     * A postal code (in the United States, this is the ZIP code).
     */
    case postalCode = "postal-code";
    /**
     * The full name as printed on or associated with a payment instrument such
     * as a credit card. Using a full name field is preferred, typically, over
     * breaking the name into pieces.
     */
    case creditCardName = "cc-name";
    /**
     * A given (first) name as given on a payment instrument like a credit card.
     */
    case creditCardFirstName = "cc-given-name";
    /**
     * A middle name as given on a payment instrument or credit card.
     */
    case creditCardMiddleName = "cc-additional-name";
    /**
     * A family name, as given on a credit card.
     */
    case creditCardLastName = "cc-family-name";
    /**
     * A credit card number or other number identifying a payment method, such
     * as an account number.
     */
    case paymentNumber = "cc-number";
    /**
     * A payment method expiration date, typically in the form "MM/YY" or "MM/YYYY".
     */
    case creditCardExpiration = "cc-exp";
    /**
     * The year in which the payment method expires.
     */
    case creditCardExpirationYear = "cc-exp-year";
    /**
     * The security code for the payment instrument; on credit cards, this is
     * the 3-digit verification number on the back of the card.
     */
    case creditCardSecurityCode = "cc-csc";
    /**
     * The type of payment instrument (such as "Visa" or "Master Card").
     */
    case creditCardType = "cc-type";
    /**
     * The currency in which the transaction is to take place.
     */
    case transactionCurrency = "transaction-currency";
    /**
     * The amount, given in the currency specified by "transaction-currency", of
     * the transaction, for a payment form.
     */
    case transactionAmount = "transaction-amount";
    /**
     * A preferred language, given as a valid BCP 47 language tag.
     * https://en.wikipedia.org/wiki/IETF_language_tag
     */
    case language = "language";
    /**
     * A birth date, as a full date.
     */
    case birthday = "bday";
    /**
     * The day of the month of a birth date.
     */
    case birthdayDay = "bday-day";
    /**
     * The month of the year of a birth date.
     */
    case birthdayMonth = "bday-month";
    /**
     * The year of a birth date.
     */
    case birthdayYear = "bday-year";
    /**
     * A gender identity (such as "Female", "Fa'afafine", "Hijra", "Male",
     * "Nonbinary"), as freeform text without newlines.
     */
    case gender = "sex";
    /**
     * A full telephone number, including the country code. If you need to break
     * the phone number up into its components, you can use more specific
     * phone_* values.
     */
    case phone = "tel";
    /**
     * The entire phone number without the country code component, including a
     * country-internal prefix. For the phone number "1-855-555-6502", this
     * field's value would be "855-555-6502".
     */
    case phone_national = "tel-national";
    /**
     * The phone number without the country or area code. This can be split
     * further into two parts, for phone numbers which have an exchange number
     * and then a number within the exchange. For the phone number "555-6502",
     * use "tel-local-prefix" for "555" and "tel-local-suffix" for "6502".
     */
    case phone_local = "tel-local";
    /**
     * The country code, such as "1" for the United States, Canada, and other
     * areas in North America and parts of the Caribbean.
     */
    case phone_country = "tel-country-code";
    /**
     * The area code, with any country-internal prefix applied if appropriate.
     */
    case phone_area = "tel-area-code";
    /**
     * A telephone extension code within the phone number, such as a room or
     * suite number in a hotel or an office extension in a company.
     */
    case phone_extension = "tel-extension";
    /**
     * A URL for an instant messaging protocol endpoint, such as
     * "xmpp:username@example.net".
     */
    case impp = "impp";
    /**
     * A URL, such as a home page or company website address as appropriate
     * given the context of the other fields in the form.
     */
    case url = "url";
    /**
     * The URL of an image representing the person, company, or contact
     * information given in the other fields in the form.
     */
    case photo = "photo";
    /**
     * Passkeys generated by the Web Authentication API, as requested by a
     * conditional navigator.credentials.get() call (i.e., one that includes
     * mediation: 'conditional'). See Sign in with a passkey through form
     * autofill for more details.
     * https://web.dev/passkey-form-autofill/
     */
    case webauthn = "webauthn";
}