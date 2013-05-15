// SpryPanelSelector.js - version 0.5 - Spry Pre-Release 1.7
//
// Copyright (c) 2009. Adobe Systems Incorporated.
// All rights reserved.
//
// Redistribution and use in source and binary forms, with or without
// modification, are permitted provided that the following conditions are met:
//
//   * Redistributions of source code must retain the above copyright notice,
//     this list of conditions and the following disclaimer.
//   * Redistributions in binary form must reproduce the above copyright notice,
//     this list of conditions and the following disclaimer in the documentation
//     and/or other materials provided with the distribution.
//   * Neither the name of Adobe Systems Incorporated nor the names of its
//     contributors may be used to endorse or promote products derived from this
//     software without specific prior written permission.
//
// THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
// AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
// IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
// ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
// LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
// CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
// SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
// INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
// CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
// ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
// POSSIBILITY OF SUCH DAMAGE.

(function() { // BeginSpryComponent

if (typeof Spry == "undefined" || !Spry.Widget || !Spry.Widget.Base)
{
	alert("SpryPanelSelector.js requires SpryWidget.js!");
	return;
}

Spry.Widget.PanelSelector = function(elements, panel, opts)
{
	Spry.Widget.Base.call(this);

	this.elements = Spry.$$(elements);
	this.panel = panel;
	this.disablePanelCallbacks = 0;

	// Initialize the accordion object with the global defaults.

	this.setOptions(this, Spry.Widget.PanelSelector.config);
	
	// Override the defaults with any options passed into the constructor.

	this.setOptions(this, opts);

	this.attachBehaviors();
};

Spry.Widget.PanelSelector.config = {
	event:                   "click",
	defaultButton:           0,
	selectionStopsSlideShow: true,
	useHrefs:                false,
	selectedClass:           "PanelSelectorButtonSelected",
	unselectedClass:         "PanelSelectorButtonUnselected",
	downClass:               "PanelSelectorButtonDown",
	disabledClass:           "PanelSelectorButtonDisabled",
	hoverClass:              "PanelSelectorButtonHover",
	focusedClass:            "PanelSelectorButtonFocused"
};

Spry.Widget.PanelSelector.prototype = new Spry.Widget.Base();
Spry.Widget.PanelSelector.prototype.constructor = Spry.Widget.PanelSelector;

Spry.Widget.PanelSelector.prototype.getPanelIDFromHREF = function(ele)
{
	if (ele)
	{
		var href = ele.getAttribute("href");
		if (href != undefined && href.search(/^#\w/) != -1)
			return href.replace(/.*#/, "#");
	}
	return null;
};

Spry.Widget.PanelSelector.prototype.elementToIndex = function(ele)
{
	var ea = this.elements;
	var n = ea.length;
	for (var i = 0; i < n; i++)
		if (ea[i] == ele) return i;
	return -1;
};

Spry.Widget.PanelSelector.prototype.indexToElement = function(eleOrIndex)
{
	return (typeof eleOrIndex == "number") ? this.elements[eleOrIndex] : eleOrIndex;
};


Spry.Widget.PanelSelector.prototype.enableButton = function(eleOrIndex)
{
	var ele = this.indexToElement(eleOrIndex);
	if (ele && ele.psButton)
		ele.psButton.enable();
};


Spry.Widget.PanelSelector.prototype.disableButton = function(eleOrIndex)
{
	var ele = this.indexToElement(eleOrIndex);
	if (ele && ele.psButton)
		ele.psButton.disable();
};

Spry.Widget.PanelSelector.prototype.selectButton = function(eleOrIndex, suppressPanelSync)
{
	++this.disablePanelCallbacks;

	var elements = this.elements;
	var ele = this.indexToElement(eleOrIndex);

	for (var i = 0; i < elements.length; i++)
	{
		var e = elements[i];
		this.removeClassName(e, (e == ele) ? this.unselectedClass : this.selectedClass);
		this.addClassName(e, (e == ele) ? this.selectedClass : this.unselectedClass);
	}

	if (!suppressPanelSync && this.panel)
	{
		var href = this.useHrefs ? this.getPanelIDFromHREF(ele) : null;
		this.panel.showPanel(href ? href : this.elementToIndex(ele));
	}

	--this.disablePanelCallbacks;
};

Spry.Widget.PanelSelector.prototype.handleActivate = function(ele)
{
	var evt = new Spry.Widget.Event(this, { target: ele, targetIndex: this.elementToIndex(ele) });
	this.notifyObservers("onPrePanelSelectorClick", evt);
	if (!evt.performDefaultAction)
		return;

	if (this.selectionStopsSlideShow && this.panel)
		this.panel.stop();

	this.selectButton(ele);

	this.notifyObservers("onPostPanelSelectorClick", evt);
};

Spry.Widget.PanelSelector.prototype.handlePanelChange = function(data)
{
	if (this.disablePanelCallbacks)
		return;

	var panelEle = data.target;
	var panelIndex = data.targetIndex;

	if (!this.panel)
		return;

	var panelID = panelEle.id;
	var btns = this.elements;
	var btn = btns[panelIndex];

	if (panelID)
	{
		// Search for the button to activate based on
		// the panel's id.
		
		for (var i = 0; !btn && i < this.elements.length; i++)
		{
			var b = btns[i];
			var id = this.getPanelIDFromHREF(b);
			if (id == panelID)
			{
				btn = b;
				break;
			}
		}
	}

	if (btn)
		this.selectButton(btn, true);
};

Spry.Widget.PanelSelector.prototype.attachButtonBehaviors = function(ele)
{
	var self = this;

	var activateFunc = function(e) { self.handleActivate(ele); return false; };

	ele.psButton = new Spry.Widget.Button(ele, {
		onclick:       activateFunc,
		downClass:     this.downClass,
		hoverClass:    this.hoverClass,
		disabledClass: this.disabledClass,
		focusedClass:  this.focusedClass
	});

	if (this.event != "click")
		this.addEventListener(ele, this.event, activateFunc, false);
};

Spry.Widget.PanelSelector.prototype.attachBehaviors = function()
{
	var self = this;
	var eles = this.elements;

	for (var i = 0; i < eles.length; i++)
		this.attachButtonBehaviors(eles[i]);

	if (this.panel)
		this.panel.addObserver({ onPostShowPanel: function(n, data){ self.handlePanelChange(data); }});

	this.selectButton(this.defaultButton);
};

})(); // EndSpryComponent