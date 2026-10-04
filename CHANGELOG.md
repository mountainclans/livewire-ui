# Changelog

All notable changes to `livewire-ui` will be documented in this file.

## 1.8.0 - 2026-10-04

- `x-ui.multiselect`: optional search. The `searchable` attribute adds a field that narrows the options by label, case-insensitively. Off by default. Texts come from the `search-placeholder` and `no-results` attributes.
- `x-ui.multiselect`: the option list is as wide as the field instead of a fixed 25rem.
- `x-ui.multiselect`: options are highlighted on hover.

## 1.7.0 - 2026-10-04

- Fix: the loading overlay of `x-ui.form` is translucent again on Tailwind 4. `bg-opacity-50` no longer exists there, so the overlay was solid white and hid the whole form during every Livewire request.
- `x-ui.multiselect` sends a request on close only when the choice has changed. Opening and closing the list without changes no longer refreshes the component.

## 1.6.0 - 2026-09-29

Support Livewire 4; replace utilities removed in Tailwind 4

## 1.5.0 - 2026-06-22

**Full Changelog**: https://github.com/mountainclans/livewire-ui/compare/1.4.0...1.5.0

## 1.4.0 - 2026-04-06

Toggle: add darker mode

## 1.3.0 - 2025-09-23

ability to disable default classes

## 1.1.1 - 2025-07-04

Add form component

## 1.0.1 - 2025-07-04

Update components

## 1.0.0 - 2025-07-04

Initial release
